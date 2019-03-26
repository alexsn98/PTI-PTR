@extends('homeLayout')

@section('content')
    <h2>Nome da cadeira - {{$cadeira->nome}}</h2>

    <h2> Turmas </h2>
    <ul>
        @foreach ($turmas as $turma)
            @if (in_array($turma->id, $turmasAtual))
                <li><a href="turma/{{$turma->id}}"> TP-{{$turma->numero}} - Turma Atual </a></li>
            @else
                <li><a href="turma/{{$turma->id}}"> TP-{{$turma->numero}} </a></li>
            @endif
        @endforeach
    </ul>
@endsection