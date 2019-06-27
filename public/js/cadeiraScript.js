function selecionarTurma(turmaId) {
    let docente = document.getElementById('left').getElementsByTagName('h4')[0];
    let horarioDuvidas = document.getElementById('left').getElementsByTagName('h4')[1];
    let tipo = document.getElementById('right').getElementsByTagName('h4')[0];
    let aulasTipo = document.getElementById('view1').getElementsByTagName('div')[0].getElementsByTagName('ul')[0];
    let semAulasTipo = document.getElementById('view1').getElementsByTagName('div')[0].getElementsByTagName('h3')[0];
    let inscreverTurma = document.getElementById('inscreverTurmaButton'); //para aluno
    let paginaTurma = document.getElementById('paginaTurmaButton'); //para admin
    let fecharTurma = document.getElementById('fecharTurmaButton'); //para admin

    let url = '/home/turmaInfo/' + turmaId;

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", url, true);
    xhttp.send();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //limpa pagina
            docente.textContent = 'Professor:'
            horarioDuvidas.textContent = 'Horário dúvidas:'
            tipo.textContent = 'Tipo:';

            if (inscreverTurma != null) inscreverTurma.style.display = "none";

            if (aulasTipo != null) document.getElementById('view1').getElementsByTagName('div')[0].removeChild(aulasTipo);

            if (semAulasTipo != null) document.getElementById('view1').getElementsByTagName('div')[0].removeChild(semAulasTipo);

            //preenche pagina
            resposta = JSON.parse(this.responseText);  

            if (resposta.tipo == 0) turmaTipo = "Teórica-Prática";
            if (resposta.tipo == 1) turmaTipo = "Teórica";

            docente.textContent += ' ' + resposta.docente; 
            
            horarioDuvidas.textContent += ' ' + resposta.horarioDuvidas; 
            tipo.textContent += ' ' + turmaTipo;

            if (paginaTurma != null && resposta.estado == 'comVagas') {
                paginaTurma.style.display = "block";
                paginaTurma.setAttribute("href", "/home/cadeira/turma/" + turmaId);
            }

            if (resposta.eRegente) {
                fecharTurma.style.display = "block";
                paginaTurma.setAttribute("href", "/home/cadeira/fecharTurma/" + turmaId);
            }
                        
            if (resposta.aulasTipo.length > 0) {
                let listaAulasTipo = document.createElement("ul");

                if (inscreverTurma != null && !turmasAtuais.includes(turmaId) && resposta.estado == 'comVagas') {
                    inscreverTurma.style.display = "block";
                    inscreverTurma.setAttribute("href","inscreverTurma/" + turmaId)
                }

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
            
            else {
                let avisoAulasTipo = document.createElement("h3");

                let node = document.createTextNode("Sem aulas tipo");
      
                avisoAulasTipo.appendChild(node);

                document.getElementById('view1').getElementsByTagName('div')[0].appendChild(avisoAulasTipo); 
            }
        }
    };
}