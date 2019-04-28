@extends('homeLayout')

@section('cssPage')
    <link rel="stylesheet" href={{asset('css/adminHome.css')}}>
@endsection

@section('content')
    <div id="title">
        <h1>Admin - Home</h1>
    </div>
    <div id="container">
        <div id="divUser">
            <div class="image">
                <img src={{asset('img/user.png')}}>
            </div>
            <div class="text">
                <h2>Utilizadores</h2>
            </div>
        </div>
        <div id="divCurso">
            <div class="image">
                <img src={{asset('img/curso.png')}}>
            </div>
            <div class="text">
                <h2>Cursos</h2>
            </div>
        </div>
        <div id="divCadeira">
            <div class="image">
                <img src={{asset('img/cadeira.png')}}>
            </div>
            <div class="text">
                <h2>Cadeiras</h2>
            </div>
        </div>
    </div>
@endsection