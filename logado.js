document.addEventListener("DOMContentLoaded", function () {
    // Verificar se o usuário está logado (você pode ajustar isso conforme sua lógica de login)
    var usuarioLogado = true; // Suponha que o usuário está logado

    // Selecionar o contêiner do menu
    var menuContainer = document.getElementById("menu-container");

    if (usuarioLogado) {
        // Se o usuário estiver logado, criar elementos de área do usuário
        var usuarioContainer = document.createElement("div");
        usuarioContainer.classList.add("usuario-container");

        // Adicionar nome do usuário
        var nomeUsuario = document.createElement("span");
        nomeUsuario.textContent = "Olá, Nome do Usuário";
        usuarioContainer.appendChild(nomeUsuario);

        // Adicionar link de logout
        var linkLogout = document.createElement("a");
        linkLogout.href = "logout.php"; // Substitua pelo caminho correto para a página de logout
        linkLogout.textContent = "Sair";
        usuarioContainer.appendChild(linkLogout);

        // Adicionar área do usuário ao contêiner do menu
        menuContainer.appendChild(usuarioContainer);
    }
});
