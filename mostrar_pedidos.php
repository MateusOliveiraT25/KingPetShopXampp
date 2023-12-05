<?php
session_start();

// Verificar se a sessão de pedidos existe
if (isset($_SESSION['pedidos']) && count($_SESSION['pedidos']) > 0) {
    echo "<h2>Lista de Pedidos</h2>";
    echo "<ul>";

    foreach ($_SESSION['pedidos'] as $pedido) {
        echo "<li>";
        echo "ID do Pedido: " . $pedido['id'] . "<br>";
        echo "Valor Total: R$ " . number_format($pedido['valor_total'], 2) . "<br>";
        echo "Método de Pagamento: " . $pedido['metodo_pagamento'] . "<br>";

        // Adicione mais informações do pedido conforme necessário

        echo "</li>";
    }

    echo "</ul>";
} else {
    echo "<p>Nenhum pedido encontrado.</p>";
}

// Adicione um link para voltar à página inicial ou a qualquer outra página desejada
echo '<a href="index.php">Voltar para a Página Inicial</a>';
?>
