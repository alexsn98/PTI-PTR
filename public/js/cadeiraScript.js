function selecionarTurma(turmaId) {
    let docente = document.getElementById('left').getElementsByTagName('h4')[0];
    let tipo = document.getElementById('right').getElementsByTagName('h4')[0];
    let aulasTipo = document.getElementById('view1').getElementsByTagName('div')[0].getElementsByTagName('ul')[0];
    let inscreverTurma = document.getElementById('view1').getElementsByTagName('div')[1].getElementsByTagName('a')[0];
    let linkInscreverTurma = "inscreverTurma/" + turmaId;
    
    let url = '/home/turmaInfo/' + turmaId;
    
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

            if (resposta.tipo == 0) turmaTipo = "Teórica-Prática";
            if (resposta.tipo == 1) turmaTipo = "Teórica";

            docente.textContent += ' ' + resposta.docente; 
            tipo.textContent += ' ' + turmaTipo;
            
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