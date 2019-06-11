const aulaTipoForm = document.getElementById('criarAulaTipo');
const aulaForm = document.getElementById('criarAula');
const aulasLista = document.getElementById('theCadeira').getElementsByTagName('ul')[0];

function selecionarAulaTipo(aulaTipoId) {
    let url = '/home/aulaTipoInfo/' + aulaTipoId;

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", url, true);
    xhttp.send();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //limpar pagina
            while (aulasLista.firstChild) {
                aulasLista.removeChild(aulasLista.firstChild);
            }

            //preencher pagina
            resposta = JSON.parse(this.responseText);  

            for (const aula of resposta.aulas) {
                let aulaItem = document.createElement("li");

                aulaItem.appendChild(document.createTextNode('Data: ' + aula.data));
                aulaItem.appendChild(document.createElement("br"));
                
                aulaItem.appendChild(document.createTextNode('Sumário: '+ aula.sumario));
                aulaItem.appendChild(document.createElement("br"));
                
                let aulaPresencas = document.createElement("a");

                aulaPresencas.appendChild(document.createTextNode('Presenças'))
                aulaPresencas.setAttribute('href', "aula/" + aula.id);

                aulaItem.appendChild(aulaPresencas);
    
                aulasLista.appendChild(aulaItem);
            }

            document.getElementById('view1').getElementsByTagName('h3')[0].style.display = 'block';
                        
            aulaForm.style.display = 'block';
            
            aulaForm.getElementsByTagName('input')[1].value = aulaTipoId;
        }
    }
}

if (aulaTipoForm) {
    const edificioSelect = aulaTipoForm.getElementsByTagName('select')[0];
    const pisoSelect = aulaTipoForm.getElementsByTagName('select')[1];
    const salaSelect = aulaTipoForm.getElementsByTagName('select')[2];

    // preenche ao carregar a paginas
    selecionarSala('edificio');

    function selecionarSala(selectAlterado) {
        if (selectAlterado == 'edificio') {
            while (pisoSelect.firstChild) {
                pisoSelect.removeChild(pisoSelect.firstChild);
            }
        }
        
        while (salaSelect.firstChild) {
            salaSelect.removeChild(salaSelect.firstChild);
        }
    
        for (const sala of salas) {
            if (sala.edificio == edificioSelect.value && selectAlterado == 'edificio') {            
                let pisoOption = document.createElement("option");
    
                pisoOption.setAttribute('value', sala.piso);
    
                let node = document.createTextNode(sala.piso);
                
                pisoOption.appendChild(node);
    
                pisoSelect.appendChild(pisoOption);
            } 
    
            if (sala.edificio == edificioSelect.value && sala.piso == pisoSelect.value ) {            
                let salaOption = document.createElement("option");
    
                salaOption.setAttribute('value', sala.id);
    
                let node = document.createTextNode(sala.num_sala);
                
                salaOption.appendChild(node);
    
                salaSelect.appendChild(salaOption);
            } 
        }
    }
}