@extends('homeLayout')

@section('cssPage')
    <link rel="stylesheet" href={{ asset('css/alunoHome.css') }}>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
@endsection

@section('content')
<h1> Aluno </h1>

<ul>
    @foreach ($turmas as $turma)
        <li> <a href="cadeira/{{ $turma->cadeira->id }}"> {{ $turma->cadeira->nome }} </a> </li>
    @endforeach
</ul>


@endsection