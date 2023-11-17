// Função para preencher a data atual no campo de data com limite até 31/12/2023 e formato dd/mm/aaaa
function preencherDataAtual() {
    const dataAtual = new Date();
    const dataLimite = new Date('2023-12-31'); // Data limite
    
    if (dataAtual > dataLimite) {
        // Se a data atual for posterior a 31/12/2023, definir a data limite como a data atual
        document.getElementById('data').setAttribute('max', dataAtual.toISOString().split('T')[0]);
    } else {
        // Caso contrário, definir a data limite como 31/12/2023
        document.getElementById('data').setAttribute('max', '2023-12-31');
    }
    
    document.getElementById('data').setAttribute('min', dataAtual.toISOString().split('T')[0]);
    
    // Converter a data atual para o formato dd/mm/aaaa
    const dia = String(dataAtual.getDate()).padStart(2, '0');
    const mes = String(dataAtual.getMonth() + 1).padStart(2, '0'); // Adicionar 1 porque janeiro é 0
    const ano = dataAtual.getFullYear();
    const dataFormatada = `${dia}/${mes}/${ano}`;
    
    document.getElementById('data-aviso').textContent = dataFormatada;
    document.getElementById('data').value = dataAtual.toISOString().split('T')[0];
}

// Chame a função ao carregar a página
window.onload = preencherDataAtual;

// Suponhamos que você tenha uma data no formato ISO (AAAA-MM-DD)
var dataIso = "2023-10-27";

// Crie um objeto Date a partir da string ISO
var data = new Date(dataIso);

// Obtenha o dia, mês e ano da data
var dia = data.getDate();
var mes = data.getMonth() + 1; // Lembre-se de adicionar 1 ao mês, pois ele é base 0
var ano = data.getFullYear();

// Formate a data no formato "dd/mm/aaaa"
var dataFormatada = dia + '/' + mes + '/' + ano;

console.log(dataFormatada); // Saída: "27/10/2023"

// Função para preencher a hora atual e definir o limite de 08:00 a 21:00
function preencherHoraAtual() {
    const horaAtual = new Date();
    const horaMinima = new Date(horaAtual);

    // Define a hora mínima como 08:00
    horaMinima.setHours(8, 0, 0); // 08:00:00

    // Impede que o usuário selecione uma hora anterior à hora atual
    if (horaAtual > horaMinima) {
        // Formate a hora atual no formato HH:mm
        const horaAtualFormatada = `${String(horaAtual.getHours()).padStart(2, '0')}:${String(horaAtual.getMinutes()).padStart(2, '0')}`;

        // Define a hora mínima como a hora atual
        horaMinima.setHours(horaAtual.getHours(), horaAtual.getMinutes(), 0);

        // Formate a hora mínima no formato HH:mm
        const horaMinimaFormatada = `${String(horaMinima.getHours()).padStart(2, '0')}:${String(horaMinima.getMinutes()).padStart(2, '0')}`;

        // Define o limite de hora no campo de entrada
        document.getElementById('hora').setAttribute('min', horaMinimaFormatada);
        document.getElementById('hora').setAttribute('max', '21:00');
        document.getElementById('hora').value = horaMinimaFormatada;
    }
}

// Chame a função ao carregar a página
window.onload = preencherHoraAtual;

<<<<<<< HEAD
=======
</script>
>>>>>>> 914fe20370a9c50223e8c74286cf33c56de28e84
