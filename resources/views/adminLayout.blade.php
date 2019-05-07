<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href= {{ asset('css/adminHome.css') }}>
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
                <h2>Falco admin</h2>
            </div>
            <ul>
                <li class="navv">Olá, {{Auth::user()->nome}}</li>
                <a class="noDecoration" href="/home/admin"><li class="navv" @yield('homeAtive')><span class="material-icons">home</span>Dashboard</li></a>
                <a class="noDecoration" href="/home/admin/utilizadores"><li class="navv" @yield('utilizadoresAtive')><span class="material-icons">people</span>Utilizadores</li></a>
                <a class="noDecoration" href="/home/admin/cursos"><li class="navv" @yield('cursosAtive')><span class="material-icons">school</span>Cursos</li></a>
                <a class="noDecoration" href="/home/admin/cadeiras"><li class="navv" @yield('cadeirasAtive')><span class="material-icons">assignment</span>Cadeiras</li></a>
                <a class="noDecoration" href="/home/admin/salas"><li class="navv" @yield('salasAtive')><span class="material-icons">meeting_room</span>Salas</li></a>
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