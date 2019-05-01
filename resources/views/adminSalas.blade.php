<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href= {{ asset('css/adminHome.css') }}>
    <link rel="stylesheet" href= {{ asset('css/adminSalas.css') }}>
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
                <li class="navv">Olá, username</li>
                <li class="navv"><a class="noDecoration" href="/home/admin"><span class="material-icons">home</span>Dashboard</a></li>
                <li class="navv"><a class="noDecoration" href="/home/admin/utilizadores"><span class="material-icons">people</span>Utilizadores</a></li>
                <li class="navv"><a class="noDecoration" href="/home/admin/cursos"><span class="material-icons">school</span>Cursos</a></li>
                <li class="navv"><a class="noDecoration" href="/home/admin/cadeiras"><span class="material-icons">assignment</span>Cadeiras</a></li>
                <li class="navv" style="opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"><a class="noDecoration" href="#"><span class="material-icons">meeting_room</span>Salas</a></li>
            </ul>
            <div id="logout">
                <h2><i class="material-icons">input</i>Logout</h2>
            </div>
        </div>
        <div id="content">
            <div id="leftContent">
                <div id="filtrar">
                    <h2>Pedidos de Salas:</h2>  
                </div>
                <div id="view">
                    <ul>
                        @foreach ($pedidosReservaSala as $pedido)
                            <li id="this"> 
                                Pedido feito por: {{$pedido->utilizadorAbre->nome}} <br>
                                Sala: {{$pedido->sala->edificio}}.{{$pedido->sala->piso}}.{{$pedido->sala->num_sala}} <br>
                                Inicio: {{$pedido->inicio}} <br>
                                Fim: {{$pedido->fim}} <br>
                                <a href="/pedido/reservaSala/aprovar/{{$pedido->id}}">Aceitar</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div id="rightContent">
                <div id="filtrar"> 
                    <h2>Reservas de Salas:</h2>     
                </div>
                <div id="view">
                    <ul>
                        @foreach ($reservasSala as $reserva)
                            <li id="this"> 
                                Reserva feita por: {{$reserva->utilizador->nome}} <br>
                                Sala: {{$reserva->sala->edificio}}.{{$reserva->sala->piso}}.{{$reserva->sala->num_sala}} <br>
                                Inicio: {{$reserva->inicio}} <br>
                                Fim: {{$reserva->fim}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>