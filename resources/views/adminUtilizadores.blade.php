@extends('layout')

@section('name', 'Admin Utilizadores')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminUsers.css') }}>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.css" rel="stylesheet"></link>
@endsection

@section('utilizadoresAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="leftContent">
        <div id="filtrar">
            {{-- <h3>Filtrar:</h3>
            <select>
                <option value="todos">Todos</option>
                <option value="admnistradores">Admnistradores</option>
                <option value="alunos">Alunos</option>
                <option value="docentes">Docentes</option>
            </select> --}}
            <h3>Pesquisar:</h3>
            <input type="text" id="searchBar" onkeyup="pesquisarUtilizadores()" placeholder="Pesquisar nome..">
        </div>
        <div id="view">
            <ul>
                @foreach ($utilizadores as $utilizador)
                    <li class="this" onclick="selecionarUtilizador({{$utilizador->id}})"> 
                        <span> {{$utilizador['nome']}} <span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="rightContent">
        <div id="filtrar"> 
            <h1>Utilizador:</h1>     
        </div>
        <div id="view1">
            <h2>Nome:</h2>
            <h2>Número:</h2>
            <h2>Cargo:</h2>
            <h2>Mail:</h2>
            <h2>Curso:</h2>
            <h2>Cadeiras:</h2>
        </div>
        <div id="operacoesUtilizador">
            <h4> Relacionar utilizador com turma: </h4>

            {{-- formulario para criar turma --}}
            <form method="POST">
                @csrf

                <div class="form-group">
                    <label>
                        Cadeira: 
                        <select name="cadeira" onchange="turmasDeCadeira()">
                            @foreach ($cadeiras as $cadeira)
                                <option value="{{$cadeira->id}}"> {{$cadeira->nome}} </option>
                            @endforeach  
                        </select>
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        Turma: 
                        <select name="turma">
                            @foreach ($cadeiras[0]->turmas as $turma)
                                <option value="{{$turma->id}}"> 
                                        @if ($turma->tipo == 0)
                                            Pratica -
                                        @else
                                            Teórica -
                                        @endIf
                                        {{$turma->numero}}
                                </option>                                
                            @endforeach
                        </select>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary" disabled>Adicionar</button>
            </form>
        </div>
    </div>
    <script src="{{asset('js/adminScript.js')}}"></script>
    <script src="{{asset('js/selectSearch.js')}}"></script>
@endsection