<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>

    <style>
        /* Adicione estilos conforme necessário */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .btn {
            display: inline-block;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #337ab7;
            color: #fff;
        }
    </style>
</head>

<body>

    <?php
    // Verifica se o método de pagamento foi especificado na URL
    if (isset($_GET['metodo'])) {
        $metodo_pagamento = $_GET['metodo'];

        // Lógica para processar o pagamento com base no método escolhido
        switch ($metodo_pagamento) {
            case 'cartao':
                echo "<h2>Pagamento com Cartão</h2>";

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

// Dados a serem enviados para a API
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
         // Redirecionar para a página de pedidos
         header("Location: pedido_confirmado.php");
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
                                <label for="numero_cartao">Número do Cartão:</label>
                                <input type="text" name="numero_cartao" required><br>

                                <label for="data_validade">Data de Validade:</label>
                                <input type="text" name="data_validade" placeholder="MM/AA" required><br>

                                <label for="codigo_seguranca">Código de Segurança:</label>
                                <input type="text" name="codigo_seguranca" required><br>

                                <input type="submit" class="btn btn-primary" value="Pagar com Cartão">
                            </form>
                        ';
                    }
                } else {
                    echo "<p>O valor total não está disponível.</p>";
                }
                break;

            case 'pix':
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
                break;

            default:
                echo "<p>Método de pagamento inválido.</p>";
        }
    } else {
        echo "<p>Nenhum método de pagamento especificado.</p>";
    }
    ?>

</body>

</html>
