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
  <header>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
      <div class="container-fluid">
        <img src="img/LogoPreto-removebg-preview.png" logo width="70vh">
        <a href="index.html" class="navbar-brand">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="produtos.html" class="nav-link active" aria-current="page">Produtos</a>
              <ul class="submenu">
                <li><a href="racao.html">Ração</a></li>
                <li><a href="acessorios.html">Acessórios</a></li>
              </ul>
            </li>

            <li class="nav-formulario">
              <a href="servicos_pet.html" class="nav-link active" aria-current="page">Serviços Pet</a>
            </li>
            <li class="nav-login">
              <a href="cadastro.html" class="nav-link active">Cadastro</a>
            </li>
            <li class="nav-login">
              <a href="login.html" class="nav-link active">Login</a>
            </li>

            <li class="nav-item">
              <a href="sobre_nos.html" class="nav-link active" aria-current="page">Sobre Nós</a>
              <ul class="submenu">
                <li><a href="politicas_do_site.html">Politicas</a></li>
                <li><a href="eticas_e_conduta.html">Ética e Conduta</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="meu_carrinho.html" class="nav-link active">
                <i class="fas fa-shopping-cart fa-lg"></i> <!-- Ícone de carrinho -->
              </a>
              <ul class="submenu">
                <li><a href="meus_pedidos.html">Meus Pedidos</a></li>
                <li><a href="meu_produto.html">Meus Produtos</a></li>
                <li><a href="pedido_confirmado.html">Pedido Confirmado</a></li>
              </ul>
            </li>

          </ul>

          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar Eventos " aria-label="Buscar">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
  </header>
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
          // Seu código PHP para obter as informações do pedido
          $id_pedido = 0456; // Substitua isso com a lógica real para obter o ID do pedido
          $total_pedido = 100.00; // Substitua isso com a lógica real para obter o total do pedido

          echo "<p>Id: $id_pedido</p>";
          echo "<p>Total: R$ " . number_format($total_pedido, 2) . "</p>";
          ?>

      </div>
  </div>
        </div>
    </div>

    <br><br><br><br><br><br>
    <br><br><br><br><br><br>
   <footer>
    <div class="footer-container">
        <div class="footer-section">
            <h4>Novidades e Promoções</h4>
            <ul>
                <li><a href="#">Ofertas Especiais</a></li>
                <li><a href="#">Clube de membros</a></li>
                <li><a href="#">Novos Produtos</a></li>
                <li><a href="#">Eventos</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Institucional</h4>
            <ul>
                <li><a href="#">Sobre Nós</a></li>
                <li><a href="#">Acessibilidade</a></li>
                <li><a href="#">Políticas do Site</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Atendimento</h4>
            <p>Horário de atendimento: 08:00 às 20:00 - Segunda a Sábado, horário de Brasília (Exceto domingo e feriados)</p>
        </div>
        <div class="footer-section">
            <h4>Links Úteis</h4>
            <ul>
                <li><a href="#">Black Friday</a></li>
                <li><a href="#">Super Outubro</a></li>
                <li><a href="#">Minha Conta</a></li>
                <li><a href="#">Meus Pedidos</a></li>
                <li><a href="#">Cartão SysTemRem</a></li>
                <li><a href="#">Canal Prime</a></li>
                <li><a href="#">Atualizar Dados</a></li>
            </ul>
        </div>
     <div class="footer-section">
    <h4>Mídias Sociais</h4>
    <ul>
        <li><a href="https://www.facebook.com/sua_pagina" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li>
        <li><a href="https://twitter.com/sua_conta" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
        <li><a href="https://www.instagram.com/sua_conta" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
    </ul>
</div>

        <div class="footer-section">
            <h4>Departamentos</h4>
            <ul>
                <li><a href="#">Acessórios</a></li>
                <li><a href="#">Ração</a></li>
                <li><a href="#">Remédios</a></li>
                <li><a href="#">Serviços</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Endereço</h4>
            <p>Rua Carlos Gomes, 1321 - 9° andar - Centro</p>
            <p>Limeira/SP - CEP: 13480-010</p>
        </div>
    </div>
</footer>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>