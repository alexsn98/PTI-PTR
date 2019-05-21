@extends('layout')

@section('name', 'Admin Cadeiras')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminCadeira.css') }}>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.css" rel="stylesheet"></link>
@endsection

@section('cadeirasAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="leftContent">
        <div id="filtrar">
            <h3>Filtrar por Curso:</h3>
            <select>
                <option value="todos">Todos</option>
                @foreach ($cursos as $curso)
                    <option value="{{$curso->nome}}" > {{$curso->nome}} </option>
                @endforeach
            </select>
        </div>
        <div id="view">
            <ul>
                @foreach ($turmas as $turma)
                    <li class="this" onclick="selecionarTurma({{$turma->id}})"> 
                        {{$turma->cadeira->nome}} &#9773&#9773&#9773 Turma nº{{ $turma->numero }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div id="rightContent">
        <div id="theCadeira">
            <div id="left">
                <h4>Número:</h4>
            </div>
            <div id="right">
                <h4>Turma:</h4>
            </div>
        </div>
        <div id="view1">
            <div>
                <h4>Aulas Tipo:</h4>   
            </div>
        </div>
    </div>
    <script src="{{asset('js/docenteScript.js')}}"></script>
    <script src="{{asset('js/selectSearch.js')}}"></script>
@endsection