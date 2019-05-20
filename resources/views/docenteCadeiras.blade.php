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
                @foreach ($cadeiras as $cadeira)
                    {{-- <li class="this"> <a href="cadeira/{{ $cadeira->id}}"> {{ $cadeira->nome }} </a> </li> --}}

                    <li class="this" onclick="selecionarCadeira({{$cadeira->id}})"> 
                        {{ $cadeira->nome }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div id="rightContent">
        <div id="theCadeira">
            <div id="left">
                <h4>Nome:</h4>
            </div>
            <div id="right">
                <h4>Curso:</h4>
            </div>
        </div>
        <div id="view1">
                <div id="left">
                    <h4>Turmas:</h4>
                    
                </div>
        </div>
    </div>
    <script src="{{asset('js/docenteScript.js')}}"></script>
    <script src="{{asset('js/selectSearch.js')}}"></script>
@endsection