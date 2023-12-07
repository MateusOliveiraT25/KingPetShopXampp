<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>

    <!-- Link para o arquivo de estilo CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
      // Use jQuery para carregar o cabeçalho em todas as páginas
      $(function () {
        $("#header").load("header.php");
      });
      $(function () {
        $("#footer").load("footer.html");
      });
    </script>
</head>
<body>

    <!-- Navegação -->
    <nav>
         <!-- header -->
    <div id="header"></div>
    </nav>

    <!-- Conteúdo da Página -->
    <div class="container">
        <h1 class="text-center">Produtos Disponíveis</h1>

        <!-- Incluir o código PHP para exibir a lista de produtos -->
        <?php
            // Conectar ao banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "king";
            $conn = new mysqli($servername, $username, $password, $database);

            // Verificar a conexão
            if ($conn->connect_error) {
                die("Falha na conexão com o banco de dados: " . $conn->connect_error);
            }

            // Processar a consulta para obter todos os produtos
            $sql = "SELECT * FROM produtos";
            $result = $conn->query($sql);
// Processar a consulta para obter todos os produtos
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

// Função para obter o HTML da imagem com verificação de existência
function getImagemHTML($imagemNome) {
    $caminho_imagem = "" . htmlspecialchars($imagemNome);

    // Verifica se a imagem existe
    if (file_exists($caminho_imagem)) {
        return '<img src="' . $caminho_imagem . '" class="card-img-top product-image" alt="Imagem do Produto">';
    } else {
        // Se a imagem não existir, use uma imagem padrão ou exiba uma mensagem
        return '<img src="caminho/imagem/padrao.jpg" class="card-img-top product-image" alt="Imagem Padrão">';
        // ou return '<p>Imagem não disponível</p>';
    }
}

// Exibir os produtos
if ($result->num_rows > 0) {
    echo '<div class="row">';
    
    while ($row = $result->fetch_assoc()) {
        $imagem_html = getImagemHTML($row['imagem']);

        echo sprintf(
            '<div class="col-md-4">
                <div class="product-card mb-3" style="width: 18rem;">
                    %s
                    <div class="card-body">
                        <h5 class="card-title">%s</h5>
                        <p class="card-text">%s</p>
                        <p class="card-text">%s</p>
                        <a href="#" class="btn btn-primary btn-block btn-lg" onclick="adicionarAoCarrinho(\'%s\', %d, %f)">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>',
            $imagem_html,
            htmlspecialchars($row['nome']),
            htmlspecialchars($row['descricao']),
            number_format($row['preco'], 2, ',', '.'), // Formatação de preço
            htmlspecialchars($row['nome']),
            $row['id'],
            $row['preco']
        );
    }

    echo '</div>';
} else {
    echo "<p>Nenhum produto disponível.</p>";
}


// Fechar a conexão com o banco de dados
$conn->close();
        ?>
    </div>

    <!-- Inclua este script na parte inferior da sua página de produtos -->
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

    <!-- Rodapé da Página -->
    <div id="footer"></div>
</body>
</html>
