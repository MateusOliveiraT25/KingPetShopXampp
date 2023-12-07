<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body id="bodyPedidoConfirmado">
 
  <br><br>  <br>
      <div class="container" style="padding: 1em;">
        
        <div id="bloco-confirma" style="text-align: center;">
            <p style="font-size: 1.5rem; color: #000000; font-weight: 600;">Seu pedido foi realizado com sucesso.</p>
            <p><span style="color: #000000; font-size: 1.5rem;">Em breve você receberá um e-mail de confirmação <strong id="email"></strong> com todos os detalhes do pedido.</span></p>
            <p id="status-pedido" style="font-size: 1.25rem; color: #020202; font-weight: 600;">Pagamento Aprovado</p>
        </div>
    </div>

    <div class="container" style="padding: 1em;">
      <div style="border-radius: .5rem; background: #00000075; padding: 2rem; border: 1px solid #000;">
          <p style="font-size: 1.5rem; font-weight: 600;">Informações do Pedido</p>

          <?php
// Verifica se há informações do carrinho na URL
if (isset($_GET['carrinho'])) {
    // Obtém as informações do carrinho da URL e decodifica
    $carrinho_info = json_decode(base64_decode($_GET['carrinho']), true);

    if ($carrinho_info) {
        echo "<h2>Detalhes do Pedido</h2>";

        // Itera sobre os produtos no carrinho
        foreach ($carrinho_info as $produto) {
           
            echo "<p>Nome do Produto: " . $produto['nome'] . "</p>";
            echo "<p>Preço Unitário: R$ " . $produto['preco'] . "</p>";
            echo "<p>Quantidade: " . $produto['quantidade'] . "</p>";
            echo "<hr>";
        }

        // Exibe o valor total
        if (isset($_GET['valor_total'])) {
            $valor_total = $_GET['valor_total'];
            echo "<p>Valor Total do Pedido: R$ " . number_format($valor_total, 2) . "</p>";
        } else {
            echo "<p>Valor total não disponível.</p>";
        }
    } else {
        echo "<p>Erro ao obter informações do carrinho.</p>";
    }
} else {
    echo "<p>Nenhuma informação de carrinho encontrada.</p>";
}
?>


      </div>
  </div>
        </div>
    </div>

    <br><br><br><br><br><br>
    <br><br><br><br><br><br>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
