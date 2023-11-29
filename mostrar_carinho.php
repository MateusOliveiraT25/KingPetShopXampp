<?php
session_start();

// Verificar se o carrinho existe
if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
    echo "<h2>Produtos no Carrinho</h2>";

    // Exibir a lista de produtos no carrinho
    echo "<ul>";
    foreach ($_SESSION['carrinho'] as $produto) {
        echo "<li>";
        echo "ID: " . $produto['id'] . "<br>";
        echo "Nome: " . $produto['nome'] . "<br>";
        echo "Preço: " . $produto['preco'] . "<br>";
        echo "Quantidade: " . $produto['quantidade'] . "<br>";
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>O carrinho está vazio.</p>";
}
?>
