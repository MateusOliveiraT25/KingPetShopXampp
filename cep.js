 function consultarCEP() {
        var cep = $('#cep').val();

        // Verificar se o CEP possui formato válido (apenas números)
        if (/^\d{8}$/.test(cep)) {
            // Consulta à API dos Correios
            $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function (data) {
                if (!("erro" in data)) {
                    // Preencher os campos com as informações obtidas
                    $('#resultadoCEP').html(
                        `<p><strong>Logradouro:</strong> ${data.logradouro}</p>` +
                        `<p><strong>Bairro:</strong> ${data.bairro}</p>` +
                        `<p><strong>Cidade/UF:</strong> ${data.localidade}/${data.uf}</p>`
                    );
                } else {
                    $('#resultadoCEP').html('<p>CEP não encontrado</p>');
                }
            });
        } else {
            $('#resultadoCEP').html('<p>Formato de CEP inválido</p>');
        }
    }
