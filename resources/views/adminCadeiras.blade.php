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
            <h3>Pesquisar:</h3>
            <input type="text" id="searchBar" onkeyup="pesquisarUtilizadores()" placeholder="Pesquisar nome..">
        </div>
        <div id="view">
            <ul>
                @foreach ($cadeiras as $cadeira)
                    <li class="this" onclick="selecionarCadeira({{$cadeira->id}})"> 
                        {{ $cadeira->nome }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="rightContent">
        <div id="filtrar"> 
            <h2>Criar Cadeira:</h2>     
        </div>
        <div id="view1">
            <form action="/criar/cadeira" method="POST">
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                </div>

                <div class="form-group">
                    <input type="number" class="form-control" name="etcs" placeholder="Número de ETCs" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="sigla" placeholder="Sigla" required>
                </div>

                <div class="form-group">
                    <label>
                        Regente: 
                        <select name="regente">
                            @foreach ($utilizadores as $utilizador)
                                @if ($utilizador->docente)
                                    <option value="{{$utilizador->docente->id}}"> {{$utilizador->nome}} </option>
                                @endif
                            @endforeach
                        </select>
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        Curso: 
                        <select name="curso">
                            @foreach ($cursos as $curso)
                                <option value="{{$curso->id}}"> {{$curso->nome}} </option>
                            @endforeach   
                        </select>
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        Semestre:
                        <select name="semestre">
                            <option value=1> Primeiro semestre </option>
                            <option value=2> Segundo semestre </option>
                        </select>
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        Ciclo:
                        <select name="ciclo">
                            <option value=1> Primeiro ciclo </option>
                            <option value=2> Segundo ciclo </option>
                            <option value=3> Terceiro ciclo </option>
                        </select>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>
        <div id="theCadeira">
            <div id="left">
                <h4>Nome:</h4>
                <h4>Ects:</h4>
                <h4>Regente:</h4>
                <h4>Curso:</h4>
            </div>
            <div id="right">
                <h4>Semestre:</h4>
                <h4>Ciclo:</h4>
                <br>
            </div>
        </div>
    </div>
    <script src="{{asset('js/adminScript.js')}}"></script>
    <script src="{{asset('js/selectSearch.js')}}"></script>
@endsection