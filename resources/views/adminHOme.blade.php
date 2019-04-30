@extends('homeLayout')

@section('cssPage')
    <link rel="stylesheet" href={{asset('css/adminHome.css')}}>
@endsection

@section('content')
    <div id="title">
        <h1>Admin - Home</h1>
    </div>
    <div id="container">
        <a href="/home/admin/utilizadores">
            <div id="divUser">
                <div class="image">
                    <img src={{asset('img/user.png')}}>
                </div>
                <div class="text">
                    <h2>Utilizadores</h2>
                </div>
            </div>
        </a>
        <a href="/home/admin/cursos">
            <div id="divCurso">
                <div class="image">
                    <img src={{asset('img/curso.png')}}>
                </div>
                <div class="text">
                    <h2>Cursos</h2>
                </div>
            </div>
        </a>
        <a href="/home/admin/cadeiras">
            <div id="divCadeira">
                <div class="image">
                    <img src={{asset('img/cadeira.png')}}>
                </div>
                <div class="text">
                    <h2>Cadeiras</h2>
                </div>
            </div>
        </a>
        <a href="/home/admin/salas">
            <div id="divSala">
                <div class="image">
                    <img src={{asset('img/sala.png')}}>
                </div>
                <div class="text">
                    <h2>Salas</h2>
                </div>
            </div>
        s</a>
    </div>
@endsection