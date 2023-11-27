 function consultarCEP() {
        var cep = $('#cep').val();

        // Verificar se o CEP possui formato válido (apenas números)
        if (/^\d{8}$/.test(cep)) {
            // Consulta à API dos Correios
            $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function (data) {
                if (!("erro" in data)) {
                    // Preencher os campos com as informações obtidas
                    $('#logradouro').val(data.logradouro);
                    $('#numero').val('');
                    $('#complemento').val(data.complemento);
                    $('#bairro').val(data.bairro);
                    $('#resultadoCEP').html(''); // Limpar mensagem de erro
                } else {
                    // Limpar todos os campos em caso de erro
                    $('#logradouro').val('');
                    $('#numero').val('');
                    $('#complemento').val('');
                    $('#bairro').val('');
                    $('#resultadoCEP').html('<p>CEP não encontrado</p>');
                }
            });
        } else {
            // Limpar todos os campos em caso de formato inválido
            $('#logradouro').val('');
            $('#numero').val('');
            $('#complemento').val('');
            $('#bairro').val('');
            $('#resultadoCEP').html('<p>Formato de CEP inválido</p>');
        }
    }
