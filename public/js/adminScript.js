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
  let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  xhttp.open("GET", url, true);
  xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
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