@extends('layout')

@section('name', 'Admin Salas')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/alunoSalas.css') }}>
@endsection

@section('salasAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="upperContent">
        <div id="filtrar" class="firstText">
            <h2>Pedidos de Salas:</h2>  
        </div>
        <div id="view" class="noScroll">
            <h3>Reservar sala: </h3>
            <form action="/pedido/reservaSala/criar" method="POST" id="criarReservaSala">
                @csrf
                <div class="form-group">
                    <label>
                        Edificio: 
                        <select name="edificio" onchange="selecionarSala('edificio')">
                            @for ($i = 1; $i < 7; $i++)
                                <option value="{{$i}}"> {{$i}}</option>
                            @endfor
                        </select>
                    </label>
                    <label>
                        Piso: 
                        <select name="piso" onchange="selecionarSala('piso')"></select>
                    </label>
                    <label>
                        Sala: 
                        <select name="sala"></select>
                    </label>
                </div>

                <div class="form-group">
                    <input type="time" class="form-control" name="inicio" placeholder="Hora de inicio">
                </div>
                
                <div class="form-group">
                    <input type="time" class="form-control" name="fim" placeholder="Hora de fim">
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" name="data" placeholder="Dia">
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" name="descricao" placeholder="Descrição">
                </div>
                
                <button type="submit" class="btn btn-primary">Submeter</button>
            </form>
        </div>
    </div>
    <div id="downContent">
        <div id="filtrar"> 
            <h2>Reservas de Salas:</h2>     
        </div>
        <div id="view">
            <ul>
                @foreach ($reservasSala as $reserva)
                    <li class="this"> 
                        Sala: {{$reserva->sala->edificio}}.{{$reserva->sala->piso}}.{{$reserva->sala->num_sala}} <br>
                        Inicio: {{$reserva->inicio}} <br>
                        Fim: {{$reserva->fim}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    <script type="text/javascript"> var salas = @json($salas); </script>
    <script src="{{asset('js/salasScript.js')}}"></script>
@endsection