function selecionarUtilizador(utilizadorId) {
  let info = document.getElementById('view1').getElementsByTagName('h2');
  let url = 'utilizadorInfo/' + utilizadorId;
  
  info[0].textContent = 'Nome:'
  info[1].textContent = 'Número:';
  info[2].textContent = 'Cargo:';
  info[3].textContent = 'Mail:';
  info[4].textContent = 'Curso:';
  info[5].textContent = 'Cadeiras:';      

  let xhttp = new XMLHttpRequest();

  xhttp.open("GET", url, true);
  xhttp.send();

  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        resposta = JSON.parse(this.responseText);        

        info[0].textContent += ' ' + resposta.nome;

        info[1].textContent += ' ' + resposta.numero;
        
        info[2].textContent += ' ' + resposta.cargo;

        info[3].textContent += ' ' + resposta.email;      
        
        info[4].textContent += ' ' + resposta.curso;  

        info[5].textContent += ' ' + resposta.cadeiras; 
      }
  };
}

function filtrarUtilizadores(cargo) {
  let utilizadoresLista = document.getElementById('view').getElementsByTagName('ul')[0];

  while (utilizadoresLista.firstChild) {
    utilizadoresLista.removeChild(utilizadoresLista.firstChild);
  }

  let url = 'getUsers/' + cargo;
  let xhttp = new XMLHttpRequest();

  xhttp.open("GET", url, true);
  xhttp.send();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      resposta = JSON.parse(this.responseText);

      Object.keys(resposta).forEach(utilizador => {
        utilizadoresLista.append()

        let utilizadorItem = document.createElement("li");
        let node = document.createTextNode(resposta[utilizador].nome);

        utilizadorItem.appendChild(node);
        utilizadorItem.classList.add('this');

        utilizadorItem.setAttribute('onclick', "selecionarUtilizador(" + resposta[utilizador].id + ")");

        utilizadoresLista.appendChild(utilizadorItem);
      });
    }
  }
}

let filtarSelect = document.getElementById('filtrar').getElementsByTagName('select')[0];

filtarSelect.addEventListener('change', function () {
  filtrarUtilizadores(this.value);
});