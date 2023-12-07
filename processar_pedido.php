<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect user input from the form
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $cartao = $_POST['cartao'];
    $expiracao = $_POST['expiracao'];
    $cvv = $_POST['cvv'];

    // Here you would typically process the order, save it to a database, and handle payment processing

    // For demonstration purposes, let's just display the collected information
    echo "<h2>Resumo do Pedido</h2>";
    echo "<p>Nome: $nome</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Endereço de Entrega: $endereco</p>";
    echo "<p>Número do Cartão: $cartao</p>";
    echo "<p>Data de Expiração: $expiracao</p>";
    echo "<p>CVV: $cvv</p>";
} else {
    // If the form is not submitted via POST, redirect to the checkout page
    header("Location: checkout.php");
    exit();
}
?>
