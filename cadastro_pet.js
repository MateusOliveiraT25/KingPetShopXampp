// Função para validar o formulário de cadastro de cachorro
function validarFormulario() {
    var nomeCachorro = document.getElementById("nome").value;
   var racaCachorro = document.getElementById("raca").options[document.getElementById("raca").selectedIndex].value;
    var sexoCachorro = document.querySelector('input[name="sexo"]:checked');
    var dataNascimentoCachorro = document.getElementById("data_nascimento").value;
    var pesoCachorro = document.getElementById("peso").value;

    if (nomeCachorro === "") {
        alert("Por favor, insira o nome do cachorro.");
        return false;
    }

    if (racaCachorro === "") {
        alert("Por favor, selecione a raça do cachorro.");
        return false;
    }

    if (sexoCachorro === null) {
        alert("Por favor, selecione o sexo do cachorro.");
        return false;
    }

    if (dataNascimentoCachorro === "") {
        alert("Por favor, insira a data de nascimento do cachorro.");
        return false;
    }

    if (pesoCachorro === "") {
        alert("Por favor, insira o peso do cachorro.");
        return false;
    }
 // Se o campo "castrado" não estiver marcado (não castrado), você pode exibir uma mensagem de alerta.
    if (!castradoCachorro) {
        alert("Por favor, marque a opção 'Castrado' se o cachorro for castrado.");
        return false;
    }
    return true;
}

// Event listener para o envio do formulário
var formularioCadastro = document.querySelector("form");
formularioCadastro.addEventListener("submit", function (e) {
    if (!validarFormulario()) {
        e.preventDefault(); // Impede o envio do formulário se a validação falhar
    }
});

