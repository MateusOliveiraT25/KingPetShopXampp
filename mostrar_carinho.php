<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
        }

        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .btn-danger {
            display: inline-block;
            padding: 10px;
            background-color: #d9534f;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .empty-cart-message {
            color: #777;
        }
    </style>
</head>

<body>

    <?php
    // Function to get HTML for the image with existence check
    function getImagemHTML($imagemNome)
    {
        $caminho_imagem = "img/" . htmlspecialchars($imagemNome);

        if (file_exists($caminho_imagem)) {
            return '<img src="' . $caminho_imagem . '" class="card-img-top product-image" alt="Imagem do Produto">';
        } else {
            return '<img src="img/padrao.jpg" class="card-img-top product-image" alt="Imagem Padrão">';
        }
    }

    // Check if the cart exists
    if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
        echo "<h2>Produtos no Carrinho</h2>";
        echo "<ul>";

        // Display the list of products in the cart
        foreach ($_SESSION['carrinho'] as $produto) {
            echo "<li>";
            if (isset($produto['caminho_imagem'])) {
                echo getImagemHTML($produto['caminho_imagem']);
            } else {
                echo '<p class="empty-cart-message">Imagem não disponível</p>';
            }

            echo "ID: " . $produto['id'] . "<br>";
            echo "Nome: " . $produto['nome'] . "<br>";
            echo "Preço: R$ " . $produto['preco'] . "<br>";
            echo "Quantidade: " . $produto['quantidade'] . "<br>";
            echo "</li>";
        }

        echo "</ul>";

        // Add a link to empty the cart
        echo '<a href="esvaziar_carrinho.php" class="btn btn-danger">Esvaziar Carrinho</a>';
    } else {
        echo "<p class='empty-cart-message'>O seu carrinho está vazio.</p>";
    }
    ?>

</body>

</html>
