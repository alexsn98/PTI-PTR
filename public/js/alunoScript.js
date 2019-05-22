if (window.location.pathname == "/home/aluno/home") {
    let horarioTable = document.getElementById('horario');

    // faz pedido de aulas do aluno TODO: ir buscar o ID do aluno atual 
    // COMO: Nao mandar id mas sim ver no server que user autenticado
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
}

function preencherTabela(resposta) {
    let linhasTabela = [];

    let celulasTabela = Array.from(horarioTable.getElementsByTagName('td'));

    // divide todas as celulas de acordo com a linha
    while (celulasTabela.length > 0) {
        linhasTabela.push(celulasTabela.splice(0, 6));
    }

    // percorre todas as cadeiras que o aluno tem aula
    Object.keys(resposta['turmas']).forEach(t => {
        let turma = resposta['turmas'][t];

        // percorre turmas que o aluno tem da cadeira correspondente
        turma.forEach(aula => {
            let diaSemana = aula.dia_semana - 1; // usada para selecionar coluna da tabela
            let inicio = aula.inicio.split(':');
            let fim = aula.fim.split(':');            

            let horaInicio = parseInt(inicio[0]);
            let linhaInicio = (horaInicio-8)*2

            if (horaInicio % 2 != 0) linhaInicio -= 1; 

            let horaFim = parseInt(fim[0]);
            let linhaFim = linhaInicio + ((horaFim - horaInicio)*2)

            if (horaFim % 2 != 0) linhaFim += 1;
            
            // une todas as celulas em uma so
            linhasTabela[linhaInicio][diaSemana].setAttribute('rowSpan', linhaFim-linhaInicio);

            linhasTabela[linhaInicio][diaSemana].style.backgroundColor = '#A8FFFF';

            let pau = aula.nomeCadeira + " (" + aula.tipo + ")" + " \n Sala: " +  aula.edificio + "." + aula.piso + 
                    "." + aula.sala ;

            linhasTabela[linhaInicio][diaSemana].innerText = pau; // nome da cadeira na celula
            // TODO: meter sala e tipo de aula (TP ou T)
            
            // apaga celulas em excesso
            for (let i = linhaInicio+1; i < linhaFim; i++) {
                linhasTabela[i][diaSemana].parentNode.removeChild(linhasTabela[i][diaSemana]);
            }
        });
      });
}

function selecionarTurma(turmaId) {
    let docente = document.getElementById('left').getElementsByTagName('h4')[0];
    let tipo = document.getElementById('right').getElementsByTagName('h4')[0];
    let aulasTipo = document.getElementById('view1').getElementsByTagName('div')[0].getElementsByTagName('ul')[0];
    let inscreverTurma = document.getElementById('view1').getElementsByTagName('div')[1].getElementsByTagName('a')[0];
    let linkInscreverTurma = "inscreverTurma/" + turmaId;
    
    let url = '/home/aluno/turmaInfo/' + turmaId;
    
    docente.textContent = 'Professor:'

    tipo.textContent = 'Tipo:';

    inscreverTurma.style.display = "none";

    if (aulasTipo != null) {
        document.getElementById('view1').getElementsByTagName('div')[0].removeChild(aulasTipo);
    }

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", url, true);
    xhttp.send();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            resposta = JSON.parse(this.responseText);  
            
            docente.textContent += ' ' + resposta.docente; 
            tipo.textContent += ' ' + resposta.tipo;
            
            if (resposta.aulasTipo.length > 0) {
                let listaAulasTipo = document.createElement("ul");

                inscreverTurma.style.display = "block";
                inscreverTurma.setAttribute("href", linkInscreverTurma)

                resposta.aulasTipo.forEach(aulaTipo => {
                    
                    let aulaTipoItem = document.createElement("li");
                    let diaSemana = ["Segunda", "Terça", "Quarta", "Quinta", "Sexta"][(aulaTipo.dia_semana-1)];
                    let textoItem = diaSemana + "-Feira | Inicio: " + aulaTipo.inicio + " | Fim: " + aulaTipo.fim;
                    let node = document.createTextNode(textoItem);
                    
                    aulaTipoItem.appendChild(node);
                    aulaTipoItem.classList.add('this');
                    aulaTipoItem.setAttribute('onclick', "selecionarAulaTipo(" + aulaTipo.id + ")");
                    
                    listaAulasTipo.appendChild(aulaTipoItem);
                });
              
                document.getElementById('view1').getElementsByTagName('div')[0].appendChild(listaAulasTipo);  
            }         
        }
    };
}