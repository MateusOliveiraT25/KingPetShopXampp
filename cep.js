function consultarCEP() {
    var cep = $('#cep').val();

    // Verificar se o CEP possui formato válido (apenas números)
    if (/^\d{8}$/.test(cep)) {
        // Desativar o botão enquanto a solicitação está em andamento
        $('button').prop('disabled', true);

        // Consulta à API do Postmon para o CEP
        $.getJSON(`https://api.postmon.com.br/v1/cep/${cep}`, function (cepData) {
            // Reativar o botão após a conclusão da solicitação
            $('button').prop('disabled', false);

            // Verificar se a consulta foi bem-sucedida
            if (!cepData.erro) {
                // Preencher os campos com as informações do CEP
                $('#logradouro').val(cepData.logradouro || '');  // Preencher o campo de logradouro se disponível
                $('#numero').val(cepData.numero || '');  // Preencher o campo de número se disponível
                $('#complemento').val(cepData.complemento || '');
                $('#bairro').val(cepData.bairro || '');
                $('#cidade').val(cepData.cidade || '');  // Preencher o campo de cidade
                $('#estado').val(cepData.estado || '');  // Preencher o campo de estado
                $('#resultadoCEP').html(''); // Limpar mensagem de erro

                // Atualizar a página após o preenchimento dos campos
                location.reload();
            } else {
                // Manter as informações preenchidas e exibir uma mensagem de erro para o CEP
                $('#resultadoCEP').html('<p>CEP não encontrado</p>');
            }
        }).fail(function () {
            // Reativar o botão em caso de falha na consulta do CEP
            $('button').prop('disabled', false);

            // Manter as informações preenchidas e exibir uma mensagem de erro para o CEP
            $('#resultadoCEP').html('<p>Falha na consulta de CEP. Tente novamente.</p>');
        });
    } else {
        // Limpar todos os campos em caso de formato inválido de CEP
        $('#logradouro').val('');
        $('#numero').val('');
        $('#complemento').val('');
        $('#bairro').val('');
        $('#cidade').val('');
        $('#estado').val('');

        $('#resultadoCEP').html('<p>Formato de CEP inválido</p>');
    }
}
