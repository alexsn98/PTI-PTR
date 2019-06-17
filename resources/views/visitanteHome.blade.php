@extends('layout')


@section('name', 'Admin Utilizadores')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminUsers.css') }}>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.css" rel="stylesheet"></link>
@endsection

@section('content')
    <div id="leftContent">
        <div id="filtrar">
            <h3>Lista de cadeiras:</h3>
            <h3>Pesquisar:</h3>
            <input type="text" id="searchBar" onkeyup="pesquisarCadeiras()" placeholder="Pesquisar nome..">
        </div>
        <div id="view">
            <ul>
                @foreach ($cadeiras as $cadeira)
                    <li class="this" onclick="selecionarCadeira({{$cadeira->id}})"> 
                        <span> {{$cadeira->nome}} <span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="rightContent">
        <div id="filtrar"> 
            <h1>Cadeira:</h1>     
        </div>
        <div id="view1">
            <h2>Nome:</h2>
            <h2>Ects:</h2>
            <h2>Regente:</h2>
            <h2>Curso:</h2>
            <h2>Semestre:</h2>
            <h2>Ciclo:</h2>
        </div>
    </div>

    <script src="{{asset('js/visitanteScript.js')}}"></script>
@endsection