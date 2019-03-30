@extends('homeLayout')

@section('content')

    <h1> Docente </h1>

    <h3> Coordenador do curso: </h3>
    <ul>
        @foreach ($cursos as $curso)
            <li> <a href="cadeira/{{ $curso->id}}"> {{ $curso->nome }} </a> </li>
        @endforeach
    </ul>

@endsection