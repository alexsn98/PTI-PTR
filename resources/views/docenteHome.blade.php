@extends('homeLayout')

@section('content')

    <h1> Docente </h1>

    <h3> Coordenador do curso: </h3>
    <ul>
        <li> <a href="curso/{{ $curso->id}}"> {{ $curso->nome }} </a> </li>
    </ul>

    <h3> Regente das cadeiras: </h3>
    <ul>
        @foreach ($cadeiras as $cadeira)
            <li> <a href="cadeira/{{ $cadeira->id}}"> {{ $cadeira->nome }} </a> </li>
        @endforeach
    </ul>

    <h3> Professor das turmas: </h3>
    <ul>
        @foreach ($turmas as $turma)
            <li> <a href="turma/{{ $turma->id}}"> {{ $turma->numero }} </a> </li>
        @endforeach
    </ul>

@endsection