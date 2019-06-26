@extends('layout')

@section('name', 'Admin Ajuda')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminSalas.css') }}>
@endsection

@section('ajudaAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="leftContent">
        <div id="filtrar">
            <h2>Pedidos de Ajuda:</h2>  
        </div>
        <div id="view">
            <ul>
                @foreach ($pedidosAbertos as $pedido)
                    <li class="this"> 
                        Pedido feito por: {{$pedido->utilizadorAbre->nome}} <br>
                        Texto de pedido: {{$pedido->texto_pedido}} <br>
                        <form action="/pedido/ajuda/responder/{{$pedido->id}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                    
                            <div class="form-group">
                                <label>
                                    Texto da resposta ...
                                    <textarea rows="3" cols="40" name="textoResposta"></textarea>
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="rightContent">
        <div id="filtrar"> 
            <h2> Pedidos de ajuda respondidos:</h2>     
        </div>
        <div id="view">
            <ul>
                @foreach ($pedidosFechados as $pedido)
                    <li class="this"> 
                        Pedido feito por: {{$pedido->utilizadorAbre->nome}} <br>
                        Texto de pedido: {{$pedido->texto_pedido}} <br>
                        Resposta: {{$pedido->resposta}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection