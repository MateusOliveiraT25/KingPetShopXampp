<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirecionar para a página de login se o usuário não estiver logado
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Usuário</title>
    <link rel="stylesheet" href="style.css"> <!-- Adapte conforme necessário -->
</head>
<body>
    <header>
        <h1>Bem-vindo à Área do Usuário</h1>
        <p>Olá, <?php echo $_SESSION['usuario']; ?>!</p>
    </header>

    <nav>
        <!-- Seus links de navegação ou outras opções do menu aqui -->
        <a href="logout.php">Sair</a>
    </nav>

    <section>
        <!-- Conteúdo da área do usuário aqui -->
        <p>Aqui está o conteúdo da área do usuário.</p>
    </section>

    <footer>
        <p>Rodapé da Área do Usuário</p>
    </footer>
</body>
</html>
