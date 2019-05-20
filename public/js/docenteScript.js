function selecionarCadeira(cadeiraId) {
    let nome = document.getElementById('left').getElementsByTagName('h4')[0];
    let curso = document.getElementById('right').getElementsByTagName('h4')[0];
    let linkPagina = document.getElementById('buttonCadeira');
    
    let url = 'cadeiraInfo/' + cadeiraId;
    
    nome.textContent = 'Nome:'

    curso.textContent = 'Curso:';

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", url, true);
    xhttp.send();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            resposta = JSON.parse(this.responseText);  
            
            nome.textContent += ' ' + resposta.nome; 
            curso.textContent += ' ' + resposta.curso;

            console.log(resposta.turmas);
            
        }
    };
}