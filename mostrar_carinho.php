<?php
session_start();

// Função para obter o HTML da imagem com verificação de existência
function getImagemHTML($imagemNome) {
    $caminho_imagem = "img/" . htmlspecialchars($imagemNome);

    // Verifica se a imagem existe
    if (file_exists($caminho_imagem)) {
        return '<img src="' . $caminho_imagem . '" class="card-img-top product-image" alt="Imagem do Produto">';
    } else {
        // Se a imagem não existir, use a imagem padrão da mesma pasta
        return '<img src="img/padrao.jpg" class="card-img-top product-image" alt="Imagem Padrão">';
        // ou return '<p>Imagem não disponível</p>';
    }
}

// Verificar se o carrinho existe
if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
    echo "<h2>Produtos no Carrinho</h2>";

    // Exibir a lista de produtos no carrinho
    echo "<ul>";
    foreach ($_SESSION['carrinho'] as $index => $produto) {
        echo "<li>";

        // Verificar se a chave 'caminho_imagem' está definida no produto
        if (isset($produto['caminho_imagem'])) {
            // Utilizar a função para obter o HTML da imagem
            echo getImagemHTML($produto['caminho_imagem']);
        } else {
            // Se 'caminho_imagem' não estiver definida, exibir uma mensagem de erro ou imagem padrão
            echo 'Imagem não disponível<br>';
        }

        echo "ID: " . $produto['id'] . "<br>";
        echo "Nome: " . $produto['nome'] . "<br>";
        echo "Preço: " . $produto['preco'] . "<br>";
        echo "Quantidade: " . $produto['quantidade'];

        // Adicionar botões para remover e aumentar a quantidade
        echo '<form action="atualizar_carrinho.php" method="post" style="display:inline-block;">
                <input type="hidden" name="index" value="' . $index . '">
                <button type="submit" name="action" value="remove" class="btn btn-danger btn-sm">Remover</button>
             </form>';

        echo '<form action="atualizar_carrinho.php" method="post" style="display:inline-block;">
                <input type="hidden" name="index" value="' . $index . '">
                <button type="submit" name="action" value="increase" class="btn btn-primary btn-sm">+</button>
             </form>';

        echo "</li>";
    }
    echo "</ul>";

    // Adicionar um link para esvaziar o carrinho
    echo '<a href="esvaziar_carrinho.php" class="btn btn-danger">Esvaziar Carrinho</a>';
} else {
    echo "<p>O carrinho está vazio.</p>";
}
?>
