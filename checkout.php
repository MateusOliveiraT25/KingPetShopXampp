<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Pedido</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"],
        a.btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover,
        a.btn:hover {
            background-color: #0056b3;
        }

        .empty-cart-message {
            color: #888;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <form action='pagamento.php' method='get'>
        <h2>Finalizar Pedido</h2>
        <label for='metodo'>Escolha o Método de Pagamento:</label>
        <select name='metodo' required>
            <option value='cartao'>Cartão</option>
            <option value='pix'>Pix</option>
        </select>
        <input type='submit' class='btn btn-primary' value='Pagar'>

        <a href="mostrar_carrinho.php" class="btn btn-secondary">Voltar ao Carrinho</a>
    </form>

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
    } else {
        echo "<p class='empty-cart-message'></p>";
    }
    ?>

</body>

</html>
