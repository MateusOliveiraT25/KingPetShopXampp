<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Adicione as tags head necessárias aqui -->
</head>
<body>
   <div class="container">
        <h1 class="text-center">Página de Administração</h1>
    
    <form action="adicionar_produto.php" method="post" enctype="multipart/form-data">
        <label for="nome">Nome do Produto:</label>
        <input type="text" name="nome" required><br>
        
        <label for="descricao">Descrição do Produto:</label>
        <textarea name="descricao" required></textarea><br>
        
        <label for="preco">Preço do Produto:</label>
        <input type="number" name="preco" step="0.01" required><br>

        <label for="imagem">Imagem do Produto:</label>
        <input type="file" name="imagem" accept="image/*" required><br>
        
        <button type="submit">Adicionar Produto</button>
    </form>
     <!-- Formulário para remover produto -->
        <form action="remover_produto.php" method="post">
            <h2>Remover Produto</h2>
            <label for="produto_id">Selecione o Produto a Ser Removido:</label>
            <select id="produto_id" name="produto_id" class="form-control" required>
                <?php
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

// Processar a consulta para obter todos os produtos
$sql = "SELECT id, nome FROM produtos";
$result = $conn->query($sql);

// Exibir opções do produto no formulário
if ($result && $result->num_rows > 0) {
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

            <button type="submit" name="remover_produto">Remover Produto</button>
        </form>
           </div>
</body>
</html>
