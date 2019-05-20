//admin criar cadeira

if (window.location.pathname == "/home/admin/cadeiras") {
    new SlimSelect({
        select: "select[name='regente']"
    })
    
    new SlimSelect({
        select: "select[name='curso']"
    })
}

//admin cria curso

if (window.location.pathname == "/home/admin/cursos") {
    new SlimSelect({
        select: "select[name='coordenador']"
    })
}

//admin reserva horario duvidas

if (window.location.pathname == "/home/aluno/horarioDuvidas") {
    new SlimSelect({
        select: "select[name='docente']"
    })
}