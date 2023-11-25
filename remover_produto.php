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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Produto</title>

    <!-- Link para o arquivo de estilo CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Navegação -->
    <nav>
        <ul>
            <li><a href="index.html">Página Inicial</a></li>
            <li><a href="cadastro.html">Cadastro</a></li>
            <li><a href="login.html">Login</a></li>
            <!-- Adicione mais links conforme necessário -->
        </ul>
    </nav>

    <!-- Conteúdo da Página -->
    <div class="container">
        <h1 class="text-center">Remover Produto</h1>

        <!-- Formulário para selecionar o produto a ser removido -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="produto_id">Selecione o Produto a Ser Removido:</label>
            <select id="produto_id" name="produto_id" class="form-control" required>
                <?php
                // Conectar ao banco de dados
                $conn = new mysqli($servername, $username, $password, $database);

                // Verificar a conexão
                if ($conn->connect_error) {
                    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
                }

                // Processar a consulta para obter todos os produtos
                $sql = "SELECT id, nome FROM produtos";
                $result = $conn->query($sql);

                // Exibir opções do produto no formulário
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                    }
                } else {
                    echo "<option value='' disabled>Nenhum produto disponível</option>";
                }

                // Fechar a conexão com o banco de dados
                $conn->close();
                ?>
            </select>
            <button type="submit" class="btn btn-danger">Remover Produto</button>
        </form>
    </div>

    <!-- Rodapé da Página -->
    <footer>
        <p>&copy; 2023 King Pet Shop</p>
    </footer>

</body>
</html>
