<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href= {{ asset('css/adminHome.css') }}>
    <link rel="stylesheet" href= {{ asset('css/adminCurso.css') }}>
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
                <li class="navv"><a class="noDecoration" href="/home/admin/utilizadores"><span class="material-icons">people</span>Utilizadores</a></li>
                <li class="navv"style="opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"><a class="noDecoration" href="#"><span class="material-icons">school</span>Cursos</a></li>
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
                    <h2>Lista de Cursos:</h2>  
                </div>
                <div id="view">
                    <ul>
                        @foreach ($cursos as $curso)
                            <li class="this"> {{$curso->nome}} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="rightContent">
                <div id="filtrar"> 
                    <h2>Criar Curso:</h2>     
                </div>
                <div id="view1">
                    <form action="/criar/curso" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>
                                Coordenador: 
                                <select name="coordenador">
                                    @foreach ($utilizadores as $utilizador)
                                        @if ($utilizador->docente)
                                            <option value="{{$utilizador->docente->id}}"> {{$utilizador->nome}} </option>
                                        @endif
                                    @endforeach    
                                </select>
                            </label>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </form>
                </div>
                <div id="viewCurso">
                    <h3>Nome:</h3>
                    <h3>Coordenador:</h3>
                    <h3>Cadeiras:</h3>
                        <ul>
                            <li>PDT</li>
                            <li>Redes</li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</body>