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
    // Recomendado armazenar senhas de forma segura

// Verifica se um arquivo foi enviado
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
    // Especifica o diretório local de destino para armazenar o arquivo enviado
    $targetDir = "/xampp/htdocs/img/";
    $targetFile = $targetDir . basename($_FILES['imagem']['name']);

    // Move o arquivo enviado para o diretório especificado
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $targetFile)) {
        echo "Imagem foi carregada com sucesso.";

        // Atualiza a tabela "produtos" com o caminho da imagem
        $caminhoImagem = $targetFile;
        $updateSql = "UPDATE produtos SET imagem = ? WHERE nome = ?"; // Supondo que você queira atualizar com base no nome do produto, ajuste conforme necessário
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ss", $caminhoImagem, $nome);

        if ($updateStmt->execute()) {
            echo " Caminho da imagem atualizado no banco de dados.";
        } else {
            echo "Erro ao atualizar o caminho da imagem: " . $updateStmt->error;
        }

        $updateStmt->close();
    } else {
        echo "Erro ao carregar a imagem.";
    }
}

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO produtos (nome, descricao,preco) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssd", $nome, $descricao,$preco);

    // Verifica se a inserção foi bem-sucedida
if ($stmt->execute()) {
    echo "Produto inserido com sucesso!";
} else {
    echo "Erro ao inserir produto: " . $stmt->error;
}

    $stmt->close();
}

// Fechar a conexão com o banco de dados
$conn->close();
?>