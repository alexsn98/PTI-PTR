@extends('layout')

@section('name', 'Docente Horario de Duvidas')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminSalas.css') }}>
@endsection

@section('horarioDuvidasAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="filtrar">
        <h2>Pedidos de Horarios de duvida:</h2>  
    </div>
    <div id="view">
        <ul>
            @foreach ($horarios as $horario)
                <li class="this"> 
                    Pedido feito por: {{$horario->aluno->utilizador->nome}} <br>
                    Texto de pedido: {{$horario->docente->utilizador->nome}} <br>
                    Dia: {{$horario->dia}} <br>
                    Inicio: {{$horario->inicio}} Fim: {{$horario->fim}} <br>
                </li>
            @endforeach
        </ul>
    </div>
@endsection