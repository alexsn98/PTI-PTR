let horarioTable = document.getElementById('horario');

let url = 'aluno/aulasAluno/' + 1;
let xhttp = new XMLHttpRequest();

xhttp.open("GET", url, true);
xhttp.send();

xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        resposta = JSON.parse(this.responseText);

        preencherTabela(resposta);
    }
}

function preencherTabela(resposta) {
    let linhas = horarioTable.getElementsByTagName('tr');

    let colunas = [];

    for (let l = 1; l < linhas.length; l++) {
        const linhaColunas = linhas[l].getElementsByTagName('td');
        
    }

    Object.keys(resposta['turmas']).forEach(nomeCadeira => {
        let turma = resposta['turmas'][nomeCadeira];

        turma.forEach(aula => {
            let diaSemana = aula.dia_semana;
            let inicio = aula.inicio;
            let fim = aula.fim;            

            console.log(diaSemana);
            console.log(inicio);
            console.log(fim);
            console.log('----------');
        });
      });
}