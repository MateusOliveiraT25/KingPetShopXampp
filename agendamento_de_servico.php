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
    $cidade = $_POST["cidade"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $funcionario = $_POST["funcionario"];
    $preferencia = $_POST["preferencia"];

    // Inserir os dados no banco de dados usando uma consulta preparada
    $sql = "INSERT INTO agendamento_servico (cidade, data, hora, funcionario, preferencia) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    $stmt->bind_param("sssss", $cidade, $data, $hora, $funcionario, $preferencia);

    if ($stmt->execute()) {
        // Agendamento bem-sucedido. Redirecione para a página de sucesso ou outra página desejada.
        header("Location: http://localhost/KingPetShopXampp/sucesso_agendamento.php");
        exit();
    } else {
        echo "Erro no agendamento. Por favor, tente novamente mais tarde.";
        // Pode ser interessante registrar os detalhes completos do erro em logs do servidor
    }

    $stmt->close();
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
