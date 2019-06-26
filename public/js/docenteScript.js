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

function selecionarCadeira(cadeiraId) {
    let info = document.getElementById('view1').getElementsByTagName('h2');
    let linkPagina = document.getElementById('buttonCadeira');
    
    let url = 'cadeiraInfo/' + cadeiraId;
    
    info[0].textContent = 'Nome:'
    info[1].textContent = 'ECTs:';
    info[2].textContent = 'Curso:'
    info[3].textContent = 'Semestre:';
    info[4].textContent = 'Ciclo:';
    info[5].textContent = 'Ano letivo:';
  
    let xhttp = new XMLHttpRequest();
  
    xhttp.open("GET", url, true);
    xhttp.send();
  
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          resposta = JSON.parse(this.responseText);  
          
          info[0].textContent += ' ' + resposta.nome; 
          info[1].textContent += ' ' + resposta.ects;
          info[2].textContent += ' ' + resposta.curso;
  
          info[3].textContent += ' ' + resposta.semestre + "º";
          info[4].textContent += ' ' + resposta.ciclo + "º";
          info[5].textContent += ' ' + resposta.anoLetivo;
  
          if (linkPagina == null) {
            let linkPaginaCriado = document.createElement("a");
            
            let node = document.createTextNode("Página da Cadeira");
        
            linkPaginaCriado.appendChild(node);
        
            linkPaginaCriado.id = 'buttonCadeira';
            linkPaginaCriado.classList.add('btn', 'btn-primary');
            linkPaginaCriado.setAttribute('href', '/home/cadeira/' + resposta.id);
        
            document.getElementById('view1').appendChild(linkPaginaCriado);
          }
  
          else {
            linkPagina.setAttribute('href', '/home/cadeira/' + resposta.id);
          }      
        }
    };
  }

if (window.location.pathname == "/home/docente/turmas") {
    const filtarSelect = document.getElementById('filtrar').getElementsByTagName('select')[0];
    
    filtarSelect.addEventListener('change', function () {
        filtrarTurmas(this.value);
    });
  }