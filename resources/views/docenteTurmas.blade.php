@extends('layout')

@section('name', 'Docente Turmas')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminCadeira.css') }}>
    <link rel="stylesheet" href= {{ asset('css/docenteTurma.css') }}>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.css" rel="stylesheet"></link>
@endsection

@section('turmasAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="leftContent">
        <div id="filtrar">
            <h3>Filtrar por Cadeira:</h3>
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
                        {{$turma->cadeira->nome}} - Turma 
                        @if ($turma->tipo == 0)
                            Prática
                        @else
                            Teórica
                        @endif
                        nº{{ $turma->numero }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div id="rightContent">
        <div id="theCadeira">
            <div id="left">
                <h4>Número de Turma:</h4>
            </div>
            <div id="right">
                <h4>Cadeira:</h4>
            </div>
        </div>
        <div id="view1">
            <div>
                <h4>Aulas Tipo:</h4>   
            </div>
            <div>
                <a id="paginaTurmaButton" class="btn btn-primary">Página da turma</a>
                {{-- <h4>Criar aula:</h4>
                <form action="/criar/aula" method="POST">
                    @csrf 

                    <input type="number" class="form-control" name="aulaTipo" hidden>
        
                    <div class="form-group"> Data:
                        <input type="date" class="form-control" name="data" >
                    </div> 
        
                    <div class="form-group"> Sumário:
                        <input type="text" class="form-control" name="sumario" >
                    </div> 
        
                    <button type="submit" class="btn btn-primary">Criar</button>
                </form> --}}
            </div>
        </div>
    </div>
    <script src="{{asset('js/docenteScript.js')}}"></script>
    <script src="{{asset('js/selectSearch.js')}}"></script>
@endsection