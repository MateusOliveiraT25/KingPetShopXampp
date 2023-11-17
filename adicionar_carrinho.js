// Crie uma matriz de carrinho de compras vazia para armazenar os itens.
let carrinhoDeCompras = [];

// Função para adicionar um item ao carrinho de compras.
function adicionarAoCarrinho(nomeProduto, quantidade, preco) {
    const item = {
        nome: nomeProduto,
        quantidade: quantidade,
        preco: preco,
    };
    carrinhoDeCompras.push(item);
    atualizarCarrinho(); // Atualize a exibição do carrinho.
}

// Função para atualizar a exibição do carrinho.
function atualizarCarrinho() {
    // Você pode usar esta função para exibir o conteúdo do carrinho na página de carrinho de compras (meu_carrinho.html).
    // Percorra a matriz carrinhoDeCompras e exiba os itens, quantidades e preços.
}

