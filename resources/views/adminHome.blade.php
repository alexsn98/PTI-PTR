@extends('homeLayout')

@section('content')
    <h3> Utilizadores: </h3>
    <ul>
        @foreach ($utilizadores as $utilizador)
            <li> {{$utilizador->nome}} </li>
        @endforeach
    </ul>

    <h3> Cursos: </h3>
    <ul>
        @foreach ($cursos as $curso)
            <li> {{$curso->nome}} </li>
        @endforeach
    </ul>

    <h3> Cadeiras: </h3>
    <ul>
        @foreach ($cadeiras as $cadeira)
            <li> {{$cadeira->nome}} </li>
        @endforeach
    </ul>
@endsection