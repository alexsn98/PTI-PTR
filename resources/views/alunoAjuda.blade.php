@extends('layout')

@section('name', 'Admin Ajuda')

@section('cssPagina')
    {{-- <link rel="stylesheet" href= {{ asset('css/adminSalas.css') }}> --}}
@endsection

@section('ajudaAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <form action="/pedido/ajuda/criar" method="POST">
        @csrf

        <div class="form-group">
            <textarea rows="4" cols="30" name="textoPedido">
                Texto do pedido ...
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <div id="rightContent">
        <div id="filtrar"> 
            <h2> Pedidos de ajuda respondidos:</h2>     
        </div>
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
    </div>
@endsection