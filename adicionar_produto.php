<?php
// Conectar ao banco de dados (substitua as informações de conexão conforme necessário)
$conexao = mysqli_connect("localhost", "seu_usuario", "sua_senha", "seu_banco_de_dados");

if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Recuperar dados do formulário
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

// Upload da imagem
$imagem = $_FILES['imagem'];
$imagem_nome = $imagem['name'];
$imagem_tmp = $imagem['tmp_name'];
$imagem_destino = "caminho/para/seu/upload/diretorio/" . $imagem_nome; // Substitua pelo caminho desejado

move_uploaded_file($imagem_tmp, $imagem_destino);

// Inserir dados no banco de dados
$query = "INSERT INTO produtos (nome, descricao, preco, imagem) VALUES ('$nome', '$descricao', $preco, '$imagem_nome')";

if (mysqli_query($conexao, $query)) {
    echo "Produto adicionado com sucesso!";
} else {
    echo "Erro ao adicionar produto: " . mysqli_error($conexao);
}

// Fechar a conexão
mysqli_close($conexao);
?>
