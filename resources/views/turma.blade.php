@extends('homeLayout')

@section('content')
    <h2>Número turma -> TP-{{$turma->numero}}</h2>
    <h2>Vagas -> {{$turma->numVagas}} </h2>

    @if (App\Utilizador::find(Auth::id())->aluno)
        <a href="inscreverTurma/{{$turma->id}}">Inscrever</a>
    @endif

    <h3> Aulas: </h3>
    <ul>
        @foreach ($turma->aulasTipo as $aulaTipo)
            <li> {{$aulaTipo->id}} </li>
        @endforeach
    </ul>

    @if (App\Utilizador::find(Auth::id())->admistrador)
        <h3>Criar aula tipo</h3>

        {{-- formulario para criar aula tipo --}}
        <form action="/criar/aulaTipo/{{$turma->id}}" method="POST">
            @csrf

            <div class="form-group">
                <input type="number" class="form-control" name="sala" placeholder="Sala">
            </div>
            
            <div class="form-group">
                <input type="number" class="form-control" name="diaSemana" placeholder="Dia da semana" >
            </div>
            <div class="form-group"> Hora de inicio:
                <input type="time" class="form-control" name="inicio" >
            </div>
            <div class="form-group"> Hora de fim:
                <input type="time" class="form-control" name="fim" >
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    @endif
@endsection