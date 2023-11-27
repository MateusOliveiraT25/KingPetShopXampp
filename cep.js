               `<p><strong>Logradouro:</strong> ${data.logradouro}</p>` +
                        `<p><strong>Bairro:</strong> ${data.bairro}</p>` +
                        `<p><strong>Cidade/UF:</strong> ${data.localidade}/${data.uf}</p>`
                    );
                } else {
                    $('#endereco').val(''); // Limpar o campo de endereço em caso de erro
                    $('#resultadoCEP').html('<p>CEP não encontrado</p>');
                }
            });
        } else {
            $('#endereco').val(''); // Limpar o campo de endereço em caso de formato inválido
            $('#resultadoCEP').html('<p>Formato de CEP inválido</p>');
        }
    }
