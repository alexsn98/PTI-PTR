@extends('homeLayout')

@section('cssPage')
    <link rel="stylesheet" href={{ asset('css/alunoHome.css') }}>
@endsection

@section('content')
<h1> Aluno </h1>

<ul>
    @foreach ($turmas as $turma)

        <li> <a href="cadeira/{{ $turma->cadeira->id }}"> {{ $turma->cadeira->nome }} </a> </li>

    @endforeach
</ul>


@endsection