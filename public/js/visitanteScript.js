function selecionarCadeira(cadeiraId) {
    let info = document.getElementById('view1').getElementsByTagName('h2');

    let url = '/home/visitante/cadeiraInfo/' + cadeiraId;
    
    info[0].textContent = 'Nome:'
    info[1].textContent = 'Ects:';
    info[2].textContent = 'Regente:';
    info[3].textContent = 'Curso:'

    info[4].textContent = 'Semestre:';
    info[5].textContent = 'Ciclo:';

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", url, true);
    xhttp.send();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            resposta = JSON.parse(this.responseText);        

            info[0].textContent += ' ' + resposta.nome;

            info[1].textContent += ' ' + resposta.ects;
            
            info[2].textContent += ' ' + resposta.regente;

            info[3].textContent += ' ' + resposta.curso;      
            
            info[4].textContent += ' ' + resposta.semestre + 'º';  

            info[5].textContent += ' ' + resposta.ciclo + 'º';
        }
    };
}