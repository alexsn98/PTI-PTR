@extends('layout')

@section('name', 'Docente Home')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/docenteHome.css') }}>
@endsection

@section('homeAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="divCoord">
        <h3> Coordenador do curso: </h3>
        <ul>
            <li class="this"> <a href="curso/{{ $curso->id}}"> {{ $curso->nome }} </a> </li>
        </ul>
    </div>
    <div id="divMinhasTurmas">
        <h3> Professor das turmas: </h3>
        <ul>
            @foreach ($turmas as $turma)
                <li class="this"> 
                    <a href="cadeira/turma/{{ $turma->id}}"> TP-{{ $turma->numero }} </a> 
                    <-
                    <a href="cadeira/turma/fecharTurma/{{$turma->id}}"> Fechar turma </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div id="pedidosTurma">
        <h3> Pedidos de mudanca de turma: </h3>
        <ul>
            @foreach ($pedidosMudancaTurma as $pedido)
                <li> 
                    Pedido feito por: {{$pedido->aluno->utilizador->nome}} <br>
                    Cadeira: {{$pedido->turmaPedida->cadeira->nome}} <br>
                    Para a turma: TP-{{$pedido->turmaPedida->numero}} <br>
                    <a href="/pedido/mudancaTurma/{{$pedido->id}}">Aceitar</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div id="reservarSala">
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
@endsection