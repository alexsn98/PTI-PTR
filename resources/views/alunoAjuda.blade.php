@extends('layout')

@section('name', 'Admin Ajuda')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/alunosAjuda.css') }}>
@endsection

@section('ajudaAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="title4">
        <h3>Enviar pedidos de ajuda: </h3>
    </div>
    <hr style="height: 1px; border:0; width: 98%; color:#333;background-color:#03353E; margin-left:1%; margin-top: 0%;">
    <div id="cont">
        <form action="/pedido/ajuda/criar" method="POST">
            @csrf

            <div class="form-group">
                <textarea rows="4" cols="30" name="textoPedido">
                    Texto do pedido ...
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <div id="title4">
        <h3>Pedidos de ajuda respondidos: </h3>
    </div>
    <hr style="height: 1px; border:0; width: 98%; color:#333;background-color:#03353E; margin-left:1%; margin-top: 0%;">
    <div id="view">
        <ul>
            @foreach ($pedidosFechados as $pedido)
                <li class="this"> 
                    Dúvida: {{$pedido->texto_pedido}} <br>
                    Resposta: {{$pedido->resposta}}
                </li>
            @endforeach
        </ul>
    </div>
@endsection