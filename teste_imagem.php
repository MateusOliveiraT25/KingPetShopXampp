<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Exibição de Imagem</title>
</head>
<body>

    <!-- Exibição da Imagem -->
    <?php
        $caminho_imagem = "img/brinquedo1.jpg";

        // Verifica se a imagem existe
        if (file_exists($caminho_imagem)) {
            echo '<img src="' . $caminho_imagem . '" alt="Imagem de Teste">';
        } else {
            echo '<p>Imagem não disponível</p>';
        }
    ?>

</body>
</html>
