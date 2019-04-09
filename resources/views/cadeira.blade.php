@extends('homeLayout')

@section('content')
    <h2>Nome da cadeira - {{$cadeira->nome}}</h2>

    <h2> Turmas </h2>
    <ul>
        @foreach ($turmas as $turma)

            @if (App\Utilizador::find(Auth::id())->aluno && in_array($turma->id, $turmasAtuais))
                <li><a href="turma/{{$turma->id}}"> TP-{{$turma->numero}} - Turma Atual </a></li>

            @else
                <li> TP-{{$turma->numero}} </li>
            @endif

        @endforeach
    </ul>

    <h2>Regente - {{$regente}}</h2>

    @if (App\Utilizador::find(Auth::id())->admistrador)
        <br>
        <h4>Criar Turma: </h4>

        <form action="/criar/turma/{{$cadeira->id}}" method="POST">
            @csrf

            <div class="form-group">
                <input type="text" class="form-control" name="numeroTurma" placeholder="Número da Turma">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="regente" placeholder="Regente">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="vagas" placeholder="Número de Vagas">
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    @endif
    
@endsection