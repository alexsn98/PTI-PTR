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
@endsection