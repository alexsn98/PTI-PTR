@extends('homeLayout')

@section('content')
    <h2>Número turma -> TP-{{$turma->numero}}</h2>
    <h2>Vagas -> {{$turma->numVagas}} </h2>

    <a href="inscreverTurma/{{$turma->id}}">Inscrever</a>
@endsection