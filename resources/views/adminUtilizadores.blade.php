@extends('adminLayout')
@section('name', 'Admin Utilizadores')
@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminUsers.css') }}>
    <meta name="csrf-token" content="example-content"/>
@endsection

@section('utilizadoresAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
        <div id="leftContent">
            <div id="filtrar">
                <h3>Filtrar:</h3>
                <select>
                    <option value="todos">Todos</option>
                    <option value="alunos">Alunos</option>
                    <option value="docentes">Docentes</option>
                </select>
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
        </div>
    <script src="{{asset('js/adminScript.js')}}"></script>
@endsection