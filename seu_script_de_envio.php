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
    // Verificar se todos os campos obrigatórios estão presentes
    $camposObrigatorios = ["nome", "email", "senha", "logradouro", "numero", "bairro", "cep", "estado", "cidade"];

    foreach ($camposObrigatorios as $campo) {
        if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
            echo "Por favor, preencha todos os campos obrigatórios.";
            exit();
        }
    }

    // Validar o e-mail se estiver presente
    if (isset($_POST["email"])) {
        $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);

        // Verificar se a validação foi bem-sucedida
        if ($email === false) {
            echo "Email inválido. Por favor, forneça um email válido.";
            exit();
        }
    }

    // Inserir os dados no banco de dados usando uma consulta preparada
    $sql = "INSERT INTO usuarios (email, senha, logradouro, numero, complemento, bairro, cep, estado, cidade) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }

    // Bind dos parâmetros
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"] ?? ""; // Adicionado o operador de coalescência nula para lidar com campos opcionais
    $bairro = $_POST["bairro"];
    $cep = $_POST["cep"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];

    $stmt->bind_param("sssssssss", $email, $senha, $logradouro, $numero, $complemento, $bairro, $cep, $estado, $cidade);

    if ($stmt->execute()) {
        // Cadastro bem-sucedido. Redirecione para a página de login.
        header("Location: login.html");
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
