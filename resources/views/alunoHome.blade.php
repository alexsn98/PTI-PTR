@extends('homeLayout')

@section('cssPage')
    <link rel="stylesheet" href={{ asset('css/alunoHome.css') }}>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
@endsection

@section('content')
    <h1> Aluno </h1>

    <h3>Cadeiras inscrito: </h3>
    <ul>
        @foreach ($cadeiras as $cadeira)
            <li> <a href="cadeira/{{ $cadeira->id }}"> {{ $cadeira->nome }} </a> </li>
        @endforeach
    </ul>
@endsection