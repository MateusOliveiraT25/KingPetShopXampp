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
    // Validar os dados do formulário (substitua com validações específicas)
    $nome = $_POST["nome"];
    $raca = $_POST["raca"];
    $sexo = $_POST["sexo"];
    $castrado = isset($_POST["castrado"]) ? 1 : 0; // Se marcado, castrado = 1, senão, castrado = 0

    // Converter a data de nascimento para o formato do MySQL (YYYY-MM-DD)
    $dataNascimento = date("Y-m-d", strtotime($_POST["data_nascimento"]));

    $peso = $_POST["peso"];

    // Inserir os dados no banco de dados usando uma consulta preparada
    $sql = "INSERT INTO pet (nome, raca, sexo, castrado, data_nascimento, peso) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmt->bind_param("sssiid", $nome, $raca, $sexo, $castrado, $dataNascimento, $peso);

    if ($stmt->execute()) {
        // Cadastro bem-sucedido. Redirecione para a página de sucesso ou outra página desejada.
        header("Location: http://localhost/KingPetShopXampp/sucesso.php");
        exit();
    } else {
        echo "Erro no cadastro. Por favor, tente novamente mais tarde.";
        // Pode ser interessante registrar os detalhes completos do erro em logs do servidor
    }

    $stmt->close();
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
