let localizacao = window.location.pathname;

//admin criar cadeira

if (localizacao == "/home/admin/cadeiras") {
    new SlimSelect({
        select: "select[name='regente']"
    })
    
    new SlimSelect({
        select: "select[name='curso']"
    })
}

//admin cria curso

if (localizacao == "/home/admin/cursos") {
    new SlimSelect({
        select: "select[name='coordenador']"
    })
}

//admin reserva horario duvidas

if (localizacao == "/home/aluno/horarioDuvidas") {
    new SlimSelect({
        select: "select[name='docente']"
    })
}

//admin cria turma

if (localizacao.slice(0, localizacao.length-2) == "/home/cadeira") {
    new SlimSelect({
        select: "select[name='docente']"
    })
}

//admin associa aluno/docente a turma

if (localizacao == "/home/admin/utilizadores") {
    new SlimSelect({
        select: "select[name='cadeira']"
    })

    new SlimSelect({
        select: "select[name='turma']"
    })
}