<?php
session_start();
?>

<header >
  <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark" >
    <div class="container-fluid"> 
      <button class="navbar-brand home-button" onclick="window.location.href='index.html'">
        <img src="img/LogoPreto-removebg-preview.png" alt="Logo" width="70vh">
      </button>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
          <li class="nav-item">
            <a href="produtos.php" class="nav-link active" aria-current="page">Produtos</a>
            <ul class="submenu">
              <li><a href="racao.html">Ração</a></li>
              <li><a href="acessorios.html">Acessórios</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="servicos_pet.html" class="nav-link active" aria-current="page">Serviços Pet</a>
          </li>
          <li class="nav-item">
            <a href="cadastro.html" class="nav-link active">Cadastro</a>
          </li>

          <li class="nav-item">
            <a href="sobre_nos.html" class="nav-link active" aria-current="page">Sobre Nós</a>
            <ul class="submenu">
              <li><a href="politicas_do_site.html">Políticas</a></li>
              <li><a href="eticas_e_conduta.html">Ética e Conduta</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="mostrar_carrinho.php" class="nav-link active">
              <i class="fas fa-shopping-cart fa-lg"></i>
            </a>
          </li>

          <?php
          if (isset($_SESSION["usuario_id"])) {
            $usuario_email = isset($_SESSION["usuario_email"]) ? $_SESSION["usuario_email"] : "";
          ?>
            <li class="nav-item"><a href="minha_conta.html" class="nav-link"><i class="fa fa-user"></i> Minha Conta</a></li>
            <li class="nav-item"><a href="meus_pedidos.html" class="nav-link"><i class="fa fa-list"></i> Meus Pedidos</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Sair</a></li>
          <?php
          } else {
          ?>
            <li class="nav-item"><a href="login.html" class="nav-link"><i class="fa fa-sign-in"></i> Login</a></li>
          <?php
          }
          ?>

          <div class="search-form" id="bot">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
              <button class="btn btn-warning" type="submit">Buscar</button>
            </form>
          </div>
        </ul>
      </div>
    </div>
  </nav>
</header>
<!-- Adicionando um elemento para o menu dinâmico -->
<div id="menu-container"></div>
<script src="logado.js"></script>