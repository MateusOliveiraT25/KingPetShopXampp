<?php
// Array associativo com informações dos produtos
$produtos = array(
    array(
        'nome' => 'Tapete Higiênico MyHug',
        'descricao' => 'Cães Adultos e Filhotes',
        'preco' => 69.90,
        'imagem' => 'img/Tapete-Higienico-Myhug-Frente.webp'
    ),
    array(
        'nome' => 'Caixa de Transporte',
        'descricao' => 'Tamanho P, Para Filhotes',
        'preco' => 419.99,
        'imagem' => 'img/Caixa-de-Transporte-C-Pet-Lateral-Direita.png'
    ),
    array(
        'nome' => 'Colchão Luxo Chic',
        'descricao' => 'Tamanho G, Azul',
        'preco' => 263.50,
        'imagem' => 'img/Colchao-Luxo-Bichinho-Chic-Azul-1.png'
    ),
    // Adicione mais produtos conforme necessário
);

// Loop para gerar os blocos de produtos
foreach ($produtos as $produto) {
    echo '<div class="col">
            <div class="product-card" style="width: 15rem;">
                <img src="' . $produto['imagem'] . '" class="card-img-top product-image" alt="' . $produto['nome'] . '">
                <div class="card-body">
                    <h5 class="card-title">' . $produto['nome'] . '</h5>
                    <p class="card-text">' . $produto['descricao'] . '</p>
                    <p class="card-money">R$ ' . number_format($produto['preco'], 2, ',', '.') . '</p>
                    <a href="#" class="btn btn-primary btn-block btn-lg" onclick="adicionarAoCarrinho(\'' . $produto['nome'] . '\', 1, ' . $produto['preco'] . ')">Adicionar ao Carrinho</a>
                </div>
            </div>
        </div>';
}
?>
<script>
  function adicionarAoCarrinho(nome, id, preco, caminhoImagem) {
    // Enviar solicitação AJAX para o servidor PHP
    $.ajax({
        type: "POST",
        url: "adicionar_ao_carrinho.php",
        data: {
            nome: nome,
            id: id,
            preco: preco,
            caminhoImagem: caminhoImagem
        },
        success: function(response) {
            alert(response); // Exibir uma mensagem de sucesso ou erro
        },
        error: function() {
            alert("Erro ao adicionar ao carrinho");
        }
    });
}

</script>
