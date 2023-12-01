<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os dados do produto
    $nome = $_POST['nome'];
    $id = $_POST['id'];
    $preco = $_POST['preco'];
    
    // Certifique-se de verificar se 'caminhoImagem' está definido
    $caminhoImagem = isset($_POST['caminhoImagem']) ? $_POST['caminhoImagem'] : '';

    // Adicionar o produto ao carrinho
    $produto = array(
        'id' => $id,
        'nome' => $nome,
        'preco' => $preco,
        'caminho_imagem' => $caminhoImagem, // Adicione o caminho da imagem
        'quantidade' => 1
    );

    // Se o carrinho não existir, crie um
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }

    // Verificar se o produto já está no carrinho
    $produto_existente = false;
    foreach ($_SESSION['carrinho'] as &$item) {
        if ($item['id'] == $id) {
            $item['quantidade']++;
            $produto_existente = true;
        }
    }

    // Se o produto não estiver no carrinho, adicione
    if (!$produto_existente) {
        $_SESSION['carrinho'][] = $produto;
    }

    echo "Produto adicionado ao carrinho com sucesso!";
} else {
    echo "Erro na solicitação.";
}
?>
