<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se o índice está definido e é um número inteiro
    if (isset($_POST['index']) && is_numeric($_POST['index'])) {
        $index = (int)$_POST['index'];

        // Verificar se o índice existe no carrinho
        if (isset($_SESSION['carrinho'][$index])) {
            $action = $_POST['action'];

            switch ($action) {
                case 'remove':
                    // Remover o item do carrinho
                    unset($_SESSION['carrinho'][$index]);
                    break;

                case 'increase':
                    // Aumentar a quantidade do item no carrinho
                    $_SESSION['carrinho'][$index]['quantidade']++;
                    break;

                // Adicione mais casos conforme necessário

                default:
                    // Ação desconhecida
                    break;
            }

            // Redirecionar de volta para a página do carrinho
            header("Location: mostrar_carinho.php");
            exit();
        }
    }
}

// Se chegarmos aqui, algo deu errado
echo "Erro na solicitação.";
?>
