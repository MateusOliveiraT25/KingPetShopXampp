<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Pagamento com Cartão</title>
    <link rel="stylesheet" href="stylepagamento.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
       
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center">Pagamento com Cartão</h1>

<?php
session_start();

// Verifica se o método de pagamento foi especificado na URL
if (isset($_GET['metodo'])) {
    $metodo_pagamento = $_GET['metodo'];

    // Lógica para processar o pagamento com base no método escolhido
    switch ($metodo_pagamento) {
        case 'cartao':
            processarPagamentoCartao();
            break;

        case 'pix':
            processarPagamentoPix();
            break;

        default:
            echo "<p>Método de pagamento inválido.</p>";
    }
} else {
    echo "<p>Nenhum método de pagamento especificado.</p>";
}

// Função para processar o pagamento com cartão
function processarPagamentoCartao()
{
    

    // Recupere o valor total do carrinho da variável de sessão
    if (isset($_SESSION['valor_total'])) {
        $valor_total = $_SESSION['valor_total'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Processar o formulário quando for enviado
            $numero_cartao = $_POST['numero_cartao'];
            $data_validade = $_POST['data_validade'];
            $codigo_seguranca = $_POST['codigo_seguranca'];

            // Simulação de processamento do pagamento com cartão usando uma API fictícia
            $api_url = 'https://api-de-pagamento.com/processar-transacao';
            $dados_api = [
                'valor_total' => $valor_total,
                // Adicione outros dados necessários para a transação
            ];

            // Inicializar cURL para fazer uma solicitação POST para a API
            $ch = curl_init($api_url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dados_api);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Simular uma resposta positiva
            $resposta_api = '{"status": "sucesso"}';

            // Processar a resposta da API (adicione lógica conforme necessário)
            if ($resposta_api) {
                $resposta_decodificada = json_decode($resposta_api, true);

                if (isset($resposta_decodificada['status']) && $resposta_decodificada['status'] === 'sucesso') {
                    echo "<p>Pagamento com cartão realizado com sucesso!</p>";

                    // Passar as informações do carrinho para a página de confirmação de pedido
                    $carrinho_info = base64_encode(json_encode($_SESSION['carrinho']));
                    $valor_total_info = $_SESSION['valor_total'];

                    // Redirecionar para a página de pedidos com as informações do carrinho
                    header("Location: pedido_confirmado.php?carrinho=$carrinho_info&valor_total=$valor_total_info");
                    exit;
                } else {
                    echo "<p>Falha no processamento do pagamento.</p>";
                }
            } else {
                echo "<p>Falha na comunicação com a API de pagamento.</p>";
            }

            // Fechar a sessão cURL
            curl_close($ch);
        } else {
            // Exibir o formulário
            echo '
            <form method="post" action="">
            <div class="mb-3">
                <label for="numero_cartao" class="form-label">Número do Cartão:</label>
                <input type="text" name="numero_cartao" class="form-control" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="data_validade" class="form-label">Data de Validade:</label>
                    <input type="text" name="data_validade" class="form-control" placeholder="MM/AA" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="codigo_seguranca" class="form-label">Código de Segurança:</label>
                    <input type="text" name="codigo_seguranca" class="form-control" required>
                </div>
            </div>

            <input type="submit" class="btn btn-primary" value="Pagar com Cartão">
        </form>
            ';
        }
    } else {
        echo "<p>O valor total não está disponível.</p>";
    }
}

// Função para processar o pagamento com Pix
function processarPagamentoPix()
{
    echo "<h2>Pagamento com Pix</h2>";

    // Recupere o valor total do carrinho da variável de sessão
    if (isset($_SESSION['valor_total'])) {
        $valor_total = $_SESSION['valor_total'];

        // Gere uma chave Pix aleatória (números aleatórios de 10 dígitos)
        $chave_pix = rand(1000000000, 9999999999);

        $descricao = "Compra na Loja XYZ";

        // Exiba as informações para o cliente
        echo "<p>Para realizar o pagamento com Pix, utilize a seguinte chave Pix:</p>";
        echo "<p><strong>$chave_pix</strong></p>";
        echo "<p>Descrição: $descricao</p>";
        echo "<p>Valor Total: R$ " . number_format($valor_total, 2) . "</p>";

        // Adicione instruções adicionais conforme necessário
    } else {
        echo "<p>O valor total não está disponível.</p>";
    }
}
?>
   </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>