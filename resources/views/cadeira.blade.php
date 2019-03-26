@extends('homeLayout')

@section('cssPage')
    <link rel="stylesheet" href={{ asset('css/alunoHome.css') }}>
@endsection

@section('content')
    <h2>Nome da cadeira - {{$cadeira->nome}}</h2>

    <h2> Turmas </h2>
    <ul>
        @foreach ($turmas as $turma)
            <li><a href="turma/{{$turma->id}}"> TP-{{$turma->numero}} </a></li>
        @endforeach
    </ul>

@endsection