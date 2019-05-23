<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href= {{ asset('css/layout.css') }}>
    @yield('cssPagina')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tulpen+One" rel="stylesheet"> 
    <title>@yield('name')</title>
</head>
<body>
    <div id="container">
        <div id="navbar">
            <div id="title">
                <h2>
                    Falco 
                    @if (Auth::user()->admistrador)
                        Admin
                    @endif
                    @if (Auth::user()->aluno)
                        Aluno
                    @endif
                    @if (Auth::user()->docente)
                        Docente
                    @endif
                </h2>
            </div>
            <ul id="nav">
                <li class="navv" id="nameNavbar">Olá, {{Auth::user()->nome}}</li>
                @if (Auth::user()->admistrador)
                    <a class="noDecoration" href="/home/admin"><li class="navv" @yield('homeAtive')><span class="material-icons">home</span>Dashboard</li></a>
                    <a class="noDecoration" href="/home/admin/utilizadores"><li class="navv" @yield('utilizadoresAtive')><span class="material-icons">people</span>Utilizadores</li></a>
                    <a class="noDecoration" href="/home/admin/cursos"><li class="navv" @yield('cursosAtive')><span class="material-icons">school</span>Cursos</li></a>
                    <a class="noDecoration" href="/home/admin/cadeiras"><li class="navv" @yield('cadeirasAtive')><span class="material-icons">assignment</span>Cadeiras</li></a>
                    <a class="noDecoration" href="/home/admin/salas"><li class="navv" @yield('salasAtive')><span class="material-icons">meeting_room</span>Salas</li></a>
                    <a class="noDecoration" href="/home/admin/ajuda"><li class="navv" @yield('ajudaAtive')><span class="material-icons">accessible_forward</span>Ajuda</li></a>
                @endif
                @if (Auth::user()->aluno)
                    <a class="noDecoration" href="/home/aluno"><li class="navv" @yield('homeAtive')><span class="material-icons">home</span>Dashboard</li></a>
                    <a class="noDecoration" href="/home/aluno/cadeiras"><li class="navv" @yield('cadeirasAtive')><span class="material-icons">assignment</span>Cadeiras</li></a>
                    <a class="noDecoration" href="/home/aluno/salas"><li class="navv" @yield('salasAtive')><span class="material-icons">meeting_room</span>Salas</li></a>
                    <a class="noDecoration" href="/home/aluno/horarioDuvidas"><li class="navv" @yield('horarioDuvidasAtive')><span class="material-icons">hot_tub</span>Horario Duvidas</li></a>
                    <a class="noDecoration" href="/home/aluno/ajuda"><li class="navv" @yield('ajudaAtive')><span class="material-icons">accessible_forward</span>Ajuda</li></a>
                    <a class="noDecoration" href="/home/aluno/ajuda"><li class="navv" ><span class="material-icons">class</span>Curriculo</li></a>
                    <a class="noDecoration" href="/home/aluno/horarioDuvidas"><li class="navv" ><span class="material-icons">money</span>Resultados</li></a>
                    <a class="noDecoration" href="/home/aluno/horarioDuvidas"><li class="navv" ><span class="material-icons">calendar_today</span>Avaliações</li></a>
                    <a class="noDecoration" href="/home/aluno/ajuda"><li class="navv" ><span class="material-icons">credit_card</span>Conta</li></a>
                @endif
                @if (Auth::user()->docente)
                    <a class="noDecoration" href="/home/docente"><li class="navv" @yield('homeAtive')><span class="material-icons">home</span>Dashboard</li></a>
                    <a class="noDecoration" href="/home/docente/turmas"><li class="navv" @yield('cadeirasAtive')><span class="material-icons">assignment</span>Turmas</li></a>
                    <a class="noDecoration" href="/home/docente/ajuda"><li class="navv" @yield('ajudaAtive')><span class="material-icons">accessible_forward</span>Ajuda</li></a>
                @endif
                
            </ul>
            <a href="/logout">
                <div id="logout">
                    <h2><i class="material-icons">input</i>Logout</h2>
                </div>
            </a>
        </div>
        <div id="content">
            @yield('content')
        </div>
    </div>
</body>
</html>