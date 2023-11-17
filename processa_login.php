<?php
// Verifique as credenciais do usuário (substitua isso pela lógica de verificação real)
$email = $_POST['email'];
$senha = $_POST['senha'];

if ($email === 'email_correto' && $senha === 'senha_correta') {
    // Iniciar a sessão
    session_start();
    
    // Armazenar informações do usuário na sessão (por exemplo, ID do usuário, nome, etc.)
    $_SESSION['user_id'] = 1;
    $_SESSION['user_nome'] = 'Nome do Usuário';

    // Redirecionar o usuário para a página de login bem-sucedida ou outra página
    header('Location: login_sucesso.php');
} else {
    // Se as credenciais estiverem incorretas, redirecione o usuário de volta para a página de login com uma mensagem de erro
    header('Location: login.php?erro=1');
}
?>
