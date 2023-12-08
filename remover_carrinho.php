<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    // Verifique se o índice existe no carrinho
    if (isset($_SESSION['carrinho'][$index])) {
        // Remova o produto do carrinho usando o índice
        unset($_SESSION['carrinho'][$index]);

        // Redirecione de volta para a página do carrinho
        header("Location: mostrar_carrinho.php");
        exit();
    }
}

// Redirecione em caso de falha ou índice ausente
header("Location: carrinho.php");
exit();
