<?php
session_start();

// Conexão com o banco de dados (substitua as credenciais com as suas)
$servername = "localhost";
$username = "root";
$password = "";
$database = "king";

$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Processamento dos dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];

    // Tratamento da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
        $imagem_temp = $_FILES['imagem']['tmp_name'];
        $imagem_nome = uniqid() . '_' . basename($_FILES['imagem']['name']);
        $caminho_destino = "caminho/para/sua/pasta/" . $imagem_nome;

        // Move a imagem para a pasta desejada
        if (move_uploaded_file($imagem_temp, $caminho_destino)) {
            // Define o caminho relativo da imagem para armazenar no banco de dados
            $caminho_imagem_para_bd = "caminho/relativo/a/partir/da/pasta/publica/" . $imagem_nome;
        } else {
            // Se falhar ao mover a imagem, defina um valor padrão ou trate conforme necessário
            $caminho_imagem_para_bd = "";
            $_SESSION["error_message"] = "Erro ao mover a imagem.";
        }
    } else {
        // Se nenhuma imagem foi enviada, defina um valor padrão ou trate conforme necessário
        $caminho_imagem_para_bd = "";
    }

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO produtos (nome, descricao, preco, imagem) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $nome, $descricao, $preco, $caminho_imagem_para_bd);

    // Verifica se a inserção foi bem-sucedida
    if ($stmt->execute()) {
        // Defina uma mensagem de sucesso na variável de sessão
        $_SESSION["success_message"] = "Produto adicionado com sucesso!";
    } else {
        // Defina uma mensagem de erro na variável de sessão
        $_SESSION["error_message"] = "Erro ao adicionar produto: " . $stmt->error;
    }

    // Fechar a declaração preparada
    $stmt->close();
}

// Fechar a conexão com o banco de dados
$conn->close();

// Redirecione de volta à página do usuário
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>
