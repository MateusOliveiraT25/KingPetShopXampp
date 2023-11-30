<?php
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

    // Processamento da imagem
    $imagem_nome = $_FILES["imagem"]["name"];
    $imagem_temp = $_FILES["imagem"]["tmp_name"];
    $caminho_destino = "img/" . $imagem_nome; // Substitua pelo caminho correto

    // Move a imagem para a pasta desejada
    if (move_uploaded_file($imagem_temp, $caminho_destino)) {
        // Inserir os dados no banco de dados
        $sql = "INSERT INTO produtos (nome, descricao, preco, imagem) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Use o caminho relativo da imagem para armazenar no banco de dados
        $caminho_relativo = "img/" . $imagem_nome;
        $stmt->bind_param("ssds", $nome, $descricao, $preco, $caminho_relativo);

        // Verifica se a inserção foi bem-sucedida
        if ($stmt->execute()) {
            echo "Produto adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar produto: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao mover a imagem para o destino desejado.";
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
