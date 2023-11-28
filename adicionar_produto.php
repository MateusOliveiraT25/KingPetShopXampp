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
    $imagem = ""; // A imagem será tratada separadamente, conforme mostrado no exemplo anterior

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO produtos (nome, descricao, preco, imagem) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $nome, $descricao, $preco, $imagem);

    // Verifica se a inserção foi bem-sucedida
    if ($stmt->execute()) {
        echo "Produto adicionado com sucesso!";
    } else {
        echo "Erro ao remover produto: " . $stmt->error;
    }

    $stmt->close();
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
