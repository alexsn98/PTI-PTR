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

function selecionarCurso(cursoId) {
  let info = document.getElementById('viewCurso').getElementsByTagName('h3');
  let url = 'cursoInfo/' + cursoId;
  
  info[0].textContent = 'Nome:'
  info[1].textContent = 'Coordenador:';
  info[2].textContent = 'Cadeiras:';
      

  let xhttp = new XMLHttpRequest();

  xhttp.open("GET", url, true);
  xhttp.send();

  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        resposta = JSON.parse(this.responseText);        

        info[0].textContent += ' ' + resposta.nome;

        info[1].textContent += ' ' + resposta.coordenador;
        
        info[2].textContent += ' ' + resposta.cadeiras; 
      }
  };
}

function selecionarCadeira(cadeiraId) {
  let infoEsquerda = document.getElementById('left').getElementsByTagName('h4');
  let infoDireita = document.getElementById('right').getElementsByTagName('h4');
  
  let url = 'cadeiraInfo/' + cadeiraId;
  
  infoEsquerda[0].textContent = 'Nome:'
  infoEsquerda[1].textContent = 'Etcs:';
  infoEsquerda[2].textContent = 'Regente:';

  infoDireita[0].textContent = 'Curso:'
  infoDireita[1].textContent = 'Semestre:';
  infoDireita[2].textContent = 'Ciclo:';
      

  let xhttp = new XMLHttpRequest();

  xhttp.open("GET", url, true);
  xhttp.send();

  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        resposta = JSON.parse(this.responseText);  
        
        infoEsquerda[0].textContent += ' ' + resposta.nome; 
        infoEsquerda[1].textContent += ' ' + resposta.etcs;
        infoEsquerda[2].textContent += ' ' + resposta.regente;

        infoDireita[0].textContent += ' ' + resposta.curso;
        infoDireita[1].textContent += ' ' + resposta.semestre;
        infoDireita[2].textContent += ' ' + resposta.ciclo;
      }
  };
}

function filtrarUtilizadores(cargo) {
  let utilizadoresLista = document.getElementById('view').getElementsByTagName('ul')[0];

  while (utilizadoresLista.firstChild) {
    utilizadoresLista.removeChild(utilizadoresLista.firstChild);
  }

  let url = 'getUtilizadores/' + cargo;
  let xhttp = new XMLHttpRequest();

  xhttp.open("GET", url, true);
  xhttp.send();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      resposta = JSON.parse(this.responseText);

      Object.keys(resposta).forEach(utilizador => {
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

if (window.location.pathname == "/home/admin/utilizadores") {
  let filtarSelect = document.getElementById('filtrar').getElementsByTagName('select')[0];

  filtarSelect.addEventListener('change', function () {
    filtrarUtilizadores(this.value);
  });
}

function filtrarCadeiras(curso) {
  let cadeirasLista = document.getElementById('view').getElementsByTagName('ul')[0];

  while (cadeirasLista.firstChild) {
    cadeirasLista.removeChild(cadeirasLista.firstChild);
  }

  let url = 'getCadeiras/' + curso;
  let xhttp = new XMLHttpRequest();

  xhttp.open("GET", url, true);
  xhttp.send();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      resposta = JSON.parse(this.responseText);

      Object.keys(resposta).forEach(cadeira => {
        let cadeiraItem = document.createElement("li");
        let node = document.createTextNode(resposta[cadeira].nome);

        cadeiraItem.appendChild(node);
        cadeiraItem.classList.add('this');

        cadeiraItem.setAttribute('onclick', "selecionarCadeira(" + resposta[cadeira].id + ")");

        cadeirasLista.appendChild(cadeiraItem);
      });
    }
  }
}

if (window.location.pathname == "/home/admin/cadeiras") {
  let filtarSelect = document.getElementById('filtrar').getElementsByTagName('select')[0];

  filtarSelect.addEventListener('change', function () {
    filtrarCadeiras(this.value);
  });
}