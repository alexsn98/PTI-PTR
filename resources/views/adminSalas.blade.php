@extends('layout')

@section('name', 'Admin Salas')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminSalas.css') }}>
@endsection

@section('salasAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="leftContent">
        <div id="filtrar">
            <h2>Pedidos de Salas:</h2>  
        </div>
        <div id="view">
            <ul>
                @foreach ($pedidosReservaSala as $pedido)
                    <li class="this"> 
                        Pedido feito por: {{$pedido->utilizadorAbre->nome}} <br>
                        Sala: {{$pedido->sala->edificio}}.{{$pedido->sala->piso}}.{{$pedido->sala->num_sala}} <br>
                        Inicio: {{$pedido->inicio}} <br>
                        Fim: {{$pedido->fim}} <br>
                        <a href="/pedido/reservaSala/aprovar/{{$pedido->id}}">Aceitar</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="rightContent">
        <div id="filtrar"> 
            <h2>Reservas de Salas:</h2>     
        </div>
        <div id="view">
            <ul>
                @foreach ($reservasSala as $reserva)
                    <li class="this"> 
                        Reserva feita por: {{$reserva->utilizador->nome}} <br>
                        Sala: {{$reserva->sala->edificio}}.{{$reserva->sala->piso}}.{{$reserva->sala->num_sala}} <br>
                        Inicio: {{$reserva->inicio}} <br>
                        Fim: {{$reserva->fim}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection