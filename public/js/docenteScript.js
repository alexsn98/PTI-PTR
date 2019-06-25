function selecionarTurma(turmaId) {
    let numero = document.getElementById('left').getElementsByTagName('h4')[0];
    let cadeira = document.getElementById('right').getElementsByTagName('h4')[0];
    let aulasTipo = document.getElementById('view1').getElementsByTagName('ul')[0];
    let paginaTurma = document.getElementById('paginaTurmaButton'); //para admin
    
    let url = 'turmaInfo/' + turmaId;
    
    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", url, true);
    xhttp.send();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            numero.textContent = 'Número de Turma:'

            cadeira.textContent = 'Cadeira:';

            if (paginaTurma != null) {
                paginaTurma.style.display = "block";
                paginaTurma.setAttribute("href", "/home/cadeira/turma/" + turmaId)
            }
            
            if (aulasTipo != null) aulasTipo.parentElement.removeChild(aulasTipo);

            resposta = JSON.parse(this.responseText);  
            
            numero.textContent += ' TP-' + resposta.numero; 
            cadeira.textContent += ' ' + resposta.cadeira;

            let listaAulasTipo = document.createElement("ul");

            resposta.aulasTipo.forEach(aulaTipo => {
                
                let aulaTipoItem = document.createElement("li");
                let textoItem = "Dia " + aulaTipo.dia_semana + " Inicio: " + aulaTipo.inicio + " Fim: " + aulaTipo.fim;
                let node = document.createTextNode(textoItem);
                
                aulaTipoItem.appendChild(node);
                aulaTipoItem.classList.add('this');
                aulaTipoItem.setAttribute('onclick', "selecionarAulaTipo(" + aulaTipo.id + ")");
                
                listaAulasTipo.appendChild(aulaTipoItem);
            });
          
            document.getElementById('view1').getElementsByTagName('div')[0].appendChild(listaAulasTipo);        
        }
    };
}

function filtrarTurmas(cadeira) {
    let turmasLista = document.getElementById('view').getElementsByTagName('ul')[0];

    while (turmasLista.firstChild) {
        turmasLista.removeChild(turmasLista.firstChild);
    }
  
    let url = 'getTurmas/' + cadeira;
    let xhttp = new XMLHttpRequest();
  
    xhttp.open("GET", url, true);
    xhttp.send();
  
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        resposta = JSON.parse(this.responseText);

        
        for (const turma of resposta.turmas) {
            let turmaItem = document.createElement("li");

            let textoItem = turma['nomeCadeira'] + ' - ';

            if (turma['tipo'] == 0) {
                textoItem += 'Turma Prática '
            } 
            else {
                textoItem += 'Turma Teórica '
            }

            textoItem += 'nº' + turma['numeroTurma'];

            let node = document.createTextNode(textoItem);
    
            turmaItem.appendChild(node);
            turmaItem.classList.add('this');
    
            turmaItem.setAttribute('onclick', "selecionarTurma(" + turma.id + ")");
    
            turmasLista.appendChild(turmaItem);
        }
      }
    }
}

if (window.location.pathname == "/home/docente/turmas") {
    const filtarSelect = document.getElementById('filtrar').getElementsByTagName('select')[0];
    
    filtarSelect.addEventListener('change', function () {
        filtrarTurmas(this.value);
    });
  }