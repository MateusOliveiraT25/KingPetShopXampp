<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        /* Seu estilo aqui */
    </style>
</head>

<body>

    <h2>Finalizar Pedido</h2>
    
    <?php
    // Função para calcular o valor total do carrinho
    function calcularValorTotal($carrinho)
    {
        $total = 0;

        foreach ($carrinho as $produto) {
            $total += $produto['preco'] * $produto['quantidade'];
        }

        return $total;
    }

    // Verificar se o carrinho existe
    if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
        // Calcular o valor total
        $valorTotal = calcularValorTotal($_SESSION['carrinho']);

        // Armazenar o valor total na sessão
        $_SESSION['valor_total'] = $valorTotal;

        echo "<form action='pagamento.php' method='get'>";
        echo "<label for='metodo'>Escolha o Método de Pagamento:</label>";
        echo "<select name='metodo' required>";
        echo "<option value='cartao'>Cartão</option>";
       
        echo "<option value='pix'>Pix</option>";
        echo "</select>";
        echo "<input type='submit' class='btn btn-primary' value='Pagar'>";
        echo "</form>";
        echo '<a href="mostrar_carrinho.php" class="btn btn-secondary">Voltar ao Carrinho</a>';
    } else {
        echo "<p class='empty-cart-message'>O seu carrinho está vazio.</p>";
    }
    ?>
    
</body>

</html>
