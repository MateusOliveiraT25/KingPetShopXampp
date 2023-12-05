<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.25.0/font/bootstrap-icons.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
            border-bottom: 2px solid #ccc;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .product-image {
            max-width: 100px;
            margin-right: 20px;
        }

        .product-details {
            flex-grow: 1;
        }

        .total {
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 20px;
        }

        .empty-cart-message {
            color: #888;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .actions a {
            text-decoration: none;
            color: #fff;
        }

        .btn-danger {
            background-color: #d9534f;
            border-color: #d9534f;
        }

        .btn-danger:hover {
            background-color: #c9302c;
            border-color: #ac2925;
        }
    </style>

    <title>Carrinho de Compras</title>
</head>

<body>

    <?php
    // Function to get HTML for the image with existence check
    function getImagemHTML($imagemNome)
    {
        $caminho_imagem = "" . htmlspecialchars($imagemNome);

        if (file_exists($caminho_imagem)) {
            return '<img src="' . $caminho_imagem . '" class="card-img-top product-image" alt="Imagem do Produto">';
        } else {
            return '<img src="img/icone.jpg" class="card-img-top product-image" alt="Imagem Padrão">';
        }
    }

    // Check if the cart exists
    if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
        echo "<h2>Produtos no Carrinho</h2>";
        echo "<ul>";

        // Variável para armazenar o valor total
        $total = 0;

        // Display the list of products in the cart
        foreach ($_SESSION['carrinho'] as $produto) {
            echo "<li>";
            if (isset($produto['caminho_imagem'])) {
                echo getImagemHTML($produto['caminho_imagem']);
            } else {
                echo '<p class="empty-cart-message">Imagem não disponível</p>';
            }

            // Adicionar o preço ao total
            $total += $produto['preco'] * $produto['quantidade'];

            echo "<div class='product-details'>";
            echo "<p>Nome: " . $produto['nome'] . "</p>";
            echo "<p>Preço: R$ " . $produto['preco'] . "</p>";
            echo "<p>Quantidade: " . $produto['quantidade'] . "</p>";
            echo "</div>";

            echo "</li>";
        }

        echo "</ul>";

        // Exibir o valor total
        echo "<p class='total'>Valor Total: R$ " . number_format($total, 2) . "</p>";

        // Adicionar um link para esvaziar o carrinho com um ícone de lixeira
        echo '<div class="actions">';
        echo '<a href="esvaziar_carrinho.php"><img src="img/lixeira.png" alt="Ícone de Lixeira"></a>';

        // Add a link to proceed to checkout with the "btn-danger" class and float it to the right
        echo '<a href="checkout.php" class="btn btn-danger">Concluir Pedido</a>';
        echo '</div>';
    } else  {
        echo "<p class='empty-cart-message'>O seu carrinho está vazio.</p>";
    }
    ?>
</body>

</html>