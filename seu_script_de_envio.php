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
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT); // Recomendado armazenar senhas de forma segura

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);

    if ($stmt->execute()) {
        // Cadastro bem-sucedido. Redirecione para a página de login.
        header("Location:http://localhost/king/login.html");
        exit();
    } else {
        echo "Erro no cadastro: " . $stmt->error;
    }

    $stmt->close();
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
