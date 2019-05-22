function selecionarTurma(turmaId) {
    let numero = document.getElementById('left').getElementsByTagName('h4')[0];
    let cadeira = document.getElementById('right').getElementsByTagName('h4')[0];
    let aulasTipo = document.getElementById('view1').getElementsByTagName('ul')[0];
    
    let url = 'turmaInfo/' + turmaId;
    
    numero.textContent = 'Número de Turma:'

    cadeira.textContent = 'Cadeira:';

    if (aulasTipo != null) {
        document.getElementById('view1').getElementsByTagName('div')[0].removeChild(aulasTipo);
    }

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", url, true);
    xhttp.send();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
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

function selecionarAulaTipo(aulaTipoId) {
    let criarAula = document.getElementById('view1').getElementsByTagName('div')[1];
    let inputAulaTipoId = document.getElementById('view1').getElementsByTagName('input')[1];

    criarAula.style.display = "block";
    inputAulaTipoId.value = aulaTipoId;
}