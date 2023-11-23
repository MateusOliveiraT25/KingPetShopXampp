<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Adicione as tags head necessárias aqui -->
</head>
<body>
    <h1>Página de Administração</h1>
    
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
</body>
</html>