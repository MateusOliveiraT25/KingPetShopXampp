<!-- navbar.php -->
<?php
session_start();
?>

<header>
  <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <!-- ... (código do navbar omitido para brevidade) -->

    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <!-- ... (itens do menu omitidos para brevidade) -->

      <?php
      if (isset($_SESSION["usuario_id"])) {
        echo '<li class="nav-item">
                <span class="nav-link active"><i class="fas fa-user fa-lg"></i> Bem-vindo, ' . $_SESSION["nomeUsuario"] . '</span>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="logout.php">Sair</a>
              </li>';
      } else {
        echo '<li class="nav-login">
                <a href="cadastro.html" class="nav-link active">Cadastro</a>
              </li>
              <li class="nav-login">
                <a href="login.html" class="nav-link active">Login</a>
              </li>';
      }
      ?>

    </ul>

    <!-- ... (código do formulário de busca omitido para brevidade) -->
  </nav>
</header>
