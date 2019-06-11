@extends('layout')

@section('name', 'Docente Cadeiras')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminUsers.css') }}>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.css" rel="stylesheet"></link>
@endsection

@section('cadeirasAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="leftContent">
        <div id="filtrar">
        </div>
        <div id="view">
            <ul>
                @foreach ($cadeiras as $cadeira)
                    <li class="this" onclick="selecionarUtilizador({{$cadeira->id}})"> 
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
            <h2>Curso:</h2>
            <h2>Turmas:</h2>
        </div>
    </div>
    <script src="{{asset('js/adminScript.js')}}"></script>
    <script src="{{asset('js/selectSearch.js')}}"></script>
@endsection