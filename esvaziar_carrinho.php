<?php
session_start();

// Esvaziar o carrinho
$_SESSION['carrinho'] = array();

// Redirecionar de volta para a página do carrinho ou qualquer outra página desejada
header("Location: mostrar_carrinho.php");
exit;
?>
