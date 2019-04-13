@extends('homeLayout')

@section('content')

    <h3> Cursos: </h3>
    <ul>
        @foreach ($cursos as $curso)
            
            <li> <a href="curso/{{ $curso->id}}"> {{ $curso->nome }} </a> </li>
        @endforeach
    </ul>

    <h3> Cadeiras: </h3>
    <ul>
        @foreach ($cadeiras as $cadeira)
            <li> <a href="cadeira/{{ $cadeira->id}}"> {{ $cadeira->nome }} </a> </li>
        @endforeach
    </ul>

@endsection