function selecionarUtilizador(utilizadorId) {
  let info = document.getElementById('view1').getElementsByTagName('h2');
  
  if (relacionar) {
    let relacionarCadeira = document.getElementById('operacoesUtilizador').getElementsByTagName('form')[0];
    relacionarCadeira.removeAttribute('action');
    
    relacionarCadeira.getElementsByTagName('button')[0].disabled = true;7

    let campoUtilizador = document.getElementById("campoUtilizador");
    
    if (campoUtilizador != null) {
      relacionarCadeira.removeChild(campoUtilizador);
    }
  }

  let url = 'utilizadorInfo/' + utilizadorId;
  
  info[0].textContent = 'Nome:'
  info[1].textContent = 'Número:';
  info[2].textContent = 'Cargo:';
  info[3].textContent = 'Mail:';
  info[4].textContent = 'Curso:';
  info[5].textContent = 'Cadeiras:'; 
  info[6].textContent = 'Turmas:';      

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

        info[6].textContent += ' ' + resposta.turmas;
        
        if (resposta.cargo == "docente") {
          let relacionarCadeira = document.getElementById('operacoesUtilizador').getElementsByTagName('form')[0];
          let campoCadeira = document.createElement("input");
          let turmasSelect = document.getElementById("operacoesUtilizador").getElementsByTagName("select")[1];

          relacionarCadeira.setAttribute('action', "/pedido/associarTurma");
          relacionarCadeira.getElementsByTagName('button')[0].disabled = false;
      
          campoCadeira.setAttribute('value', utilizadorId);
          campoCadeira.setAttribute('name', "utilizador");
          campoCadeira.setAttribute('id', "campoUtilizador");
          campoCadeira.setAttribute('type', "hidden");
          
          relacionarCadeira.appendChild(campoCadeira);

          turmasDeCadeira();
        }
      }
  };
}

function turmasDeCadeira() {
  let cadeirasSelect = document.getElementById("operacoesUtilizador").getElementsByTagName("select")[0];
  let turmasSelect = document.getElementById("operacoesUtilizador").getElementsByTagName("select")[1];

  let cadeiraId = cadeirasSelect.value;

  while (turmasSelect.firstChild) {
    turmasSelect.removeChild(turmasSelect.firstChild);
  }

  let url = 'cadeiraInfo/' + cadeiraId;

  let xhttp = new XMLHttpRequest();

  xhttp.open("GET", url, true);
  xhttp.send();

  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        resposta = JSON.parse(this.responseText);

        
        for (let i = 0; i < resposta.turmas.length; i++) {
          let optionTexto;
          const turma = resposta.turmas[i];
          
          let turmaOption = document.createElement("option");

          turmaOption.setAttribute('value', turma.id);

          if (turma.tipo == 0) {
            optionTexto = "Pratica - " + turma.numero;
          }

          else {
            optionTexto = "Teórica - " + turma.numero;
          }

          let node = document.createTextNode(optionTexto);
          
          turmaOption.appendChild(node);

          turmasSelect.appendChild(turmaOption);
        }
      }
  };
}

function selecionarCurso(cursoId) {
  let info = document.getElementById('viewCurso').getElementsByTagName('h3');
  let url = 'cursoInfo/' + cursoId;
  
  info[0].textContent = 'Nome:'
  info[1].textContent = 'Coordenador:';
  info[2].textContent = 'Faculdade:';
  info[3].textContent = 'Cadeiras:';


  let xhttp = new XMLHttpRequest();

  xhttp.open("GET", url, true);
  xhttp.send();

  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        resposta = JSON.parse(this.responseText);        

        info[0].textContent += ' ' + resposta.nome;

        info[1].textContent += ' ' + resposta.coordenador;
        
        info[2].textContent += ' ' + resposta.faculdade; 

        info[3].textContent += ' ' + resposta.cadeiras; 
      }
  };
}

function selecionarCadeira(cadeiraId) {
  let infoEsquerda = document.getElementById('left').getElementsByTagName('h4');
  let infoDireita = document.getElementById('right').getElementsByTagName('h4');
  let linkPagina = document.getElementById('buttonCadeira');
  
  let url = 'cadeiraInfo/' + cadeiraId;
  
  infoEsquerda[0].textContent = 'Nome:'
  infoEsquerda[1].textContent = 'Ects:';
  infoEsquerda[2].textContent = 'Regente:';
  infoEsquerda[3].textContent = 'Curso:'

  infoDireita[0].textContent = 'Semestre:';
  infoDireita[1].textContent = 'Ciclo:';
  infoDireita[2].textContent = 'Ano letivo:';

  let xhttp = new XMLHttpRequest();

  xhttp.open("GET", url, true);
  xhttp.send();

  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        resposta = JSON.parse(this.responseText);  
        
        infoEsquerda[0].textContent += ' ' + resposta.nome; 
        infoEsquerda[1].textContent += ' ' + resposta.ects;
        infoEsquerda[2].textContent += ' ' + resposta.regente;
        infoEsquerda[3].textContent += ' ' + resposta.curso;

        infoDireita[0].textContent += ' ' + resposta.semestre + "º";
        infoDireita[1].textContent += ' ' + resposta.ciclo + "º";
        infoDireita[2].textContent += ' ' + resposta.anoLetivo;

        if (linkPagina == null) {
          let linkPaginaCriado = document.createElement("a");
          
          let node = document.createTextNode("Página da Cadeira");
      
          linkPaginaCriado.appendChild(node);
      
          linkPaginaCriado.id = 'buttonCadeira';
          linkPaginaCriado.classList.add('btn', 'btn-primary');
          linkPaginaCriado.setAttribute('href', '/home/cadeira/' + resposta.id);
      
          document.getElementById('right').appendChild(linkPaginaCriado);
        }

        else {
          linkPagina.setAttribute('href', '/home/cadeira/' + resposta.id);
        }
      
        
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

function filtrarCadeiras(anoLetivo) {
  let cadeirasLista = document.getElementById('view').getElementsByTagName('ul')[0];

  while (cadeirasLista.firstChild) {
    cadeirasLista.removeChild(cadeirasLista.firstChild);
  }

  let url = 'getCadeiras/' + anoLetivo;
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

if (window.location.pathname == "/home/admin/utilizadores") {
  let filtarSelect = document.getElementById('filtrar').getElementsByTagName('select')[0];
  filtarSelect.addEventListener('change', function () {
    filtrarUtilizadores(this.value);
  });
}

if (window.location.pathname == "/home/admin/cadeiras") {
  let filtarSelect = document.getElementById('filtrar').getElementsByTagName('select')[0];
  filtarSelect.addEventListener('change', function () {
    filtrarCadeiras(this.value);
  });
}


function pesquisarUtilizadores() {
  let searchBar = document.getElementById('searchBar');
  let nomePesquisa = searchBar.value.toUpperCase();

  let listaUtilizadores = document.getElementById('view').getElementsByTagName('ul')[0];
  let itemsUtilizadores = listaUtilizadores.getElementsByTagName('li');

  for (let i = 0; i < itemsUtilizadores.length; i++) {
    const utilizador = itemsUtilizadores[i];
    const nomeUtilizador = utilizador.textContent || utilizador.innerText;

    if (nomeUtilizador.toUpperCase().indexOf(nomePesquisa) > -1) {
      itemsUtilizadores[i].style.display = "";
    } 
    else {
      itemsUtilizadores[i].style.display = "none";
    }
  }
}