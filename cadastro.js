// cadastro.js

function enviar() {
    // Verifica se os campos obrigatórios estão preenchidos
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;
    var confirmSenha = document.getElementById('confirmSenha').value;
    var cep = document.getElementById('cep').value;
    var estado = document.getElementById('estado').value;
    var cidade = document.getElementById('cidade').value;

    if (nome === '' || email === '' || senha === '' || confirmSenha === '' || cep === '' || estado === '' || cidade === '') {
        alert('Por favor, preencha todos os campos obrigatórios.');
        return false; // Impede o envio do formulário
    }

    // Adicione mais verificações conforme necessário

    return true; // Permite o envio do formulário se todos os campos estiverem preenchidos
}


// Event listener para o envio do formulário de cadastro
var formularioCadastro = document.getElementById("cadastroForm");
if (formularioCadastro) {
    formularioCadastro.addEventListener("submit", function (e) {
        if (!validarFormularioCadastro()) {
            e.preventDefault(); // Impede o envio do formulário se a validação falhar
        }
    });
}

// Função para validar campos obrigatórios no formulário de consulta de CEP
function enviar() {
    // Verifica se os campos obrigatórios estão preenchidos
    var nome = document.getElementById('nome').value;
    var email = document.getElementById('email').value;
    var senha = document.getElementById('senha').value;
    var confirmSenha = document.getElementById('confirmSenha').value;
    var cep = document.getElementById('cep').value;
    var estado = document.getElementById('estado').value;
    var cidade = document.getElementById('cidade').value;

    if (nome === '' || email === '' || senha === '' || confirmSenha === '' || cep === '' || estado === '' || cidade === '') {
        alert('Por favor, preencha todos os campos obrigatórios.');
        return false; // Impede o envio do formulário
    }

    // Adicione mais verificações conforme necessário

    return true; // Permite o envio do formulário se todos os campos estiverem preenchidos
}


