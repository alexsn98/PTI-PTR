function selecionarUtilizador(utilizadorId) {
    console.log(utilizadorId);

    let info = document.getElementById('view1').getElementsByTagName('h2');

    let xhttp = new XMLHttpRequest();
    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    xhttp.open("POST", 'utilizadorInfo', true);
    xhttp.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    xhttp.send();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log("pau");
        }
    };

    // info[0].textContent += ' ' + utilizador.nome;

    // info[3].textContent += ' ' + utilizador.email;
}