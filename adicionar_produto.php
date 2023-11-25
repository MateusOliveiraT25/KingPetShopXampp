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
    
    // Upload da imagem
    $caminhoImagem = "";
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
        $targetDir = "/xampp/htdocs/img/";
        $caminhoImagem = basename($_FILES['imagem']['name']);
        $targetFile = $targetDir . $caminhoImagem;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $targetFile)) {
            // Sucesso no upload
        } else {
            echo "Erro ao carregar a imagem.";
        }
    }

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO produtos (nome, descricao, preco, imagem) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $nome, $descricao, $preco, $caminhoImagem);

    // Verifica se a inserção foi bem-sucedida
    if ($stmt->execute()) {
        // Redirecionar de volta à página de produtos após a adição bem-sucedida
        header("Location: http://localhost/KingPetShopXampp/produtos.php");
        exit();
    } else {
        echo "Erro ao inserir produto: " . $stmt->error;
    }

    $stmt->close();
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
