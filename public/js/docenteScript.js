function selecionarTurma(turmaId) {
    let numero = document.getElementById('left').getElementsByTagName('h4')[0];
    let cadeira = document.getElementById('right').getElementsByTagName('h4')[0];
    
    let url = 'turmaInfo/' + turmaId;
    
    numero.textContent = 'Número:'

    cadeira.textContent = 'Cadeira:';

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", url, true);
    xhttp.send();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            resposta = JSON.parse(this.responseText);  
            
            numero.textContent += ' ' + resposta.numero; 
            cadeira.textContent += ' ' + resposta.cadeira;

            let listaAulasTipo = document.createElement("ul");

            resposta.aulasTipo.forEach(aulaTipo => {
                console.log(aulaTipo);
                
                let aulaTipoItem = document.createElement("li");
                let textoItem = "Dia " + aulaTipo.dia_semana + " Inicio: " + aulaTipo.inicio + " Fim: " + aulaTipo.fim;
                let node = document.createTextNode(textoItem);
                
                aulaTipoItem.appendChild(node);
                aulaTipoItem.classList.add('this');
                
                listaAulasTipo.appendChild(aulaTipoItem);
            });
          
            document.getElementById('view1').getElementsByTagName('div')[0].appendChild(listaAulasTipo);
            
            // linkPaginaCriado.id = 'buttonCadeira';
            
            // linkPaginaCriado.setAttribute('href', '/home/cadeira/' + resposta.id);
        
        }
    };
}