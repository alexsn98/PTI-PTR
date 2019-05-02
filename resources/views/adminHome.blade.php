<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href= {{ asset('css/adminHome.css') }}>
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
                <li class="navv" style="opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"><a class="noDecoration" href="/home/admin"><span class="material-icons">home</span>Dashboard</a></li>
                <li class="navv"><a class="noDecoration" href="/home/admin/utilizadores"><span class="material-icons">people</span>Utilizadores</a></li>
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
            <div id="divsTotal">
                <div id="divTotalUsers">
                    <div class="icon">
                        <img src={{asset('img/team.png')}}>
                    </div>
                    <div class="text">
                        <h2>Total Utilizadores</h2>
                    </div>
                    <div class="number">
                        <h2>100</h2>
                    </div>
                </div>
                <div id="divTotalCursos">
                    <div class="icon">
                        <img src={{asset('img/structure.png')}}>
                    </div>
                    <div class="text">
                        <h2>Total Cursos</h2>
                    </div>
                    <div class="number">
                        <h2>10</h2>
                    </div>
                </div>
                <div id="divTotalCadeiras">
                    <div class="icon">
                        <img src={{asset('img/clipboard.png')}}>
                    </div>
                    <div class="text">
                        <h2>Total Cadeiras</h2>
                    </div>
                    <div class="number" >
                        <h2>100</h2>
                    </div>
                </div>
            </div>
            <div id="divsOther">
                <div id="big">
                </div>
                <div id="divTotalSalas">
                    <div id="reservas">
                        <div class="header">
                            <div class="iconn">
                                <img src={{asset('img/res.png')}}>
                            </div>
                            <div class="tit">
                                <h4>Reservas Salas:</h4>
                            </div>
                        </div>
                        <div class="contai">
                            <h2>Total de reservas: 0</h2>
                        </div>
                    </div>
                    <div id="pedidos">
                        <div class="header">
                            <div class="iconn">
                                <img src={{asset('img/cur.png')}}>
                            </div>
                            <div class="tit">
                                <h4>Pedidos Salas:</h4>
                            </div>
                        </div>
                        <div class="contai1">
                            <h2>Total de pedidos: 0</h2>
                        </div>
                        <div class="hiperCont">
                            <div id="buttonIr">
                                <i class="material-icons" style="float:left; margin-top:10%; margin-left: 22%; color:white;">exit_to_app</i>
                                <h3 style="float:left;margin-top:4%; color:white;">IR</h3>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>