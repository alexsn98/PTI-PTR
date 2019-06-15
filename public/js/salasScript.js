const salaForm = document.getElementById('criarReservaSala');
const reservaForm = document.getElementById('view');
var edificioSelect;
var pisoSelect;
var salaSelect;

if (salaForm) {
    edificioSelect = salaForm.getElementsByTagName('select')[0];
    pisoSelect = salaForm.getElementsByTagName('select')[1];
    salaSelect = salaForm.getElementsByTagName('select')[2];
}

else {
    edificioSelect = reservaForm.getElementsByTagName('select')[0];
    pisoSelect = reservaForm.getElementsByTagName('select')[1];
    salaSelect = reservaForm.getElementsByTagName('select')[2];
}

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