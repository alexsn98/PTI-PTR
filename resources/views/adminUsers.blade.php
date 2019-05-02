<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href= {{ asset('css/adminHome.css') }}>
    <link rel="stylesheet" href= {{ asset('css/adminUsers.css') }}>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tulpen+One" rel="stylesheet"> 
    <title>Admin Page</title>
</head>
<body>
    <div id="container">
        <div id="navbar">
            <div id="title">
                <h2>Falco admin</h2>
            </div>
            <ul>
                <li class="navv">Olá, {{App\Utilizador::find(Auth::id())->nome}}</li>
                <li class="navv"><a class="noDecoration" href="/home/admin"><span class="material-icons">home</span>Dashboard</a></li>
                <li class="navv" style="opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"><a class="noDecoration" href="#"><span class="material-icons">people</span>Utilizadores</a></li>
                <li class="navv"><a class="noDecoration" href="/home/admin/cursos"><span class="material-icons">school</span>Cursos</a></li>
                <li class="navv"><a class="noDecoration" href="/home/admin/cadeiras"><span class="material-icons">assignment</span>Cadeiras</a></li>
                <li class="navv"><a class="noDecoration" href="/home/admin/salas"><span class="material-icons">meeting_room</span>Salas</a></li>
            </ul>
            <a href="/logout">
                <div id="logout">
                    <h2><i class="material-icons">input</i>Logout</h2>
                </div>
            </a>
        </div>
        <div id="content">
            <div id="leftContent">
                <div id="filtrar">
                    <h3>Filtrar:</h3>
                    <select>
                        <option value="todos">Todos</option>
                        <option value="alunos">Alunos</option>
                        <option value="docentes">Docentes</option>
                    </select>
                </div>
                <div id="view">
                    <ul>
                        @foreach ($utilizadores as $utilizador)
                            <li class="this"> <span>{{$utilizador->nome}}<span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="rightContent">
                <div id="filtrar"> 
                    <h2>Utilizador:</h2>     
                </div>
                <div id="view1">
                    <h2>Nome:</h2>
                    <h2>Número:</h2>
                    <h2>Cargo:</h2>
                    <h2>Mail:</h2>
                    <h2>Curso:</h2>
                    <h2>Cadeiras:</h2>
                </div>
            </div>
        </div>
    </div>
</body>