@extends('layout')

@section('name', 'Docente Home')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/docenteSalas.css') }}>
@endsection

@section('homeAtive') 
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
                        Sala: 
                        <select name="sala">
                            @foreach ($salas as $sala)
                                <option value="{{$sala->id}}"> {{$sala->edificio}}.{{$sala->piso}}.{{$sala->num_sala}} </option>
                            @endforeach    
                        </select>
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
@endsection