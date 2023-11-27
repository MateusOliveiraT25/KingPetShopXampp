<?php
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "king";
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Verificar se o campo do produto a ser removido está presente no formulário
    if (isset($_POST['produto_id'])) {
        $produto_id = $_POST['produto_id'];

        // Debug: Exibir o ID do produto para verificar se está correto
        echo "Produto ID: " . $produto_id;

        // Preparar e executar a consulta SQL para remover o produto
        $sql = "DELETE FROM produtos WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $produto_id);

        if ($stmt->execute()) {
            echo "Produto removido com sucesso!";
        } else {
            echo "Erro ao remover produto: " . $stmt->error;
        }

        $stmt->close();
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>
