@extends('layout')

@section('name', 'Aluno Home')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/alunoHome.css') }}>
@endsection

@section('homeAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <h1> Aluno </h1>

    <h3>Cadeiras inscrito: </h3>
    <ul>
        @foreach ($cadeiras as $cadeira)
            <li class="this"> <a href="cadeira/{{ $cadeira->id }}"> {{ $cadeira->nome }} </a> </li>
        @endforeach
    </ul>

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
        <div class="form-group">
            <input type="text" class="form-control" name="descricao" placeholder="Descrição">
        </div>
        <button type="submit" class="btn btn-primary">Submeter</button>
    </form>
@endsection