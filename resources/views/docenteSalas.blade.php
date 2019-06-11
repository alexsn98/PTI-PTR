@extends('layout')

@section('name', 'Docente Home')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/docenteSalas.css') }}>
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
            <form action="/pedido/reservaSala/criar" method="POST">
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
                    <input type="datetime-local" class="form-control" name="inicio" placeholder="Hora de inicio">
                </div>
                <div class="form-group">
                    <input type="datetime-local" class="form-control" name="fim" placeholder="Hora de fim">
                </div>
                <button type="submit" class="btn btn-primary">Submeter</button>
            </form>
        </div>
    </div>
    
    <script type="text/javascript"> var salas = @json($salas); </script>
    <script src="{{asset('js/salasScript.js')}}"></script>
@endsection