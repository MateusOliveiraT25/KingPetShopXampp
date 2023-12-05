<?php
session_start();

// Verificar se os dados do formulário foram enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['indice']) && isset($_POST['quantidade'])) {
    $indice = $_POST['indice'];
    $quantidade = $_POST['quantidade'];

    // Verificar se o índice é válido
    if (isset($_SESSION['carrinho'][$indice])) {
        // Atualizar a quantidade no carrinho
        $_SESSION['carrinho'][$indice]['quantidade'] = max(1, $quantidade);
    }
}

// Redirecionar de volta para a página do carrinho
header('Location: carrinho.php');
exit();
?>
