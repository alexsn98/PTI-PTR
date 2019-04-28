@extends('homeLayout')

@section('cssPage')
    <link rel="stylesheet" href={{asset('css/adminUsers.css')}}>
@endsection

@section('content')
    <div id="title">
        <h1>Admin - Utilizadores</h1>
    </div>
    <div id="precontainer">
        <h3 id="filtrar">Filtrar:</h3>
        <select>
            <option value="todos">Todos</option>
            <option value="alunos">Alunos</option>
            <option value="docentes">Docentes</option>
        </select>
    </div>
    <div id="container">
        <div id="view">
            <ul>
                @foreach ($utilizadores as $utilizador)
                    <li> <span>{{$utilizador->nome}}<span></li>
                @endforeach
            </ul>
        </div>
        <div id="individualPerson">
            <div id="prinInf">
                <div id="name">
                    <h3>Nome:</h3>
                    <h1>Rodrigo</h1>
                    <h3>Função:</h3>
                    <h1>Estudante</h1>
                </div>
                <div id="photo">
                    <div id="posPhoto">
                    </div>
                </div>
            </div>
            <div id="otherInf">
                <h3>Número:</h3>
                <h1>50011</h1>
                <h3>Mail:</h3>
                <h1>roal@live.com.pt</h1>
            </div>
        </div>
    </div>
@endsection