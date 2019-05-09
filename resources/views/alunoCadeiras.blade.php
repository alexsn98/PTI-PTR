@extends('layout')

@section('name', 'Admin Salas')

@section('cssPagina')
    {{-- <link rel="stylesheet" href= {{ asset('css/adminSalas.css') }}> --}}
@endsection

@section('cadeirasAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <h3>Cadeiras inscrito: </h3>
    <ul>
        @foreach ($cadeiras as $cadeira)
            <li class="this"> <a href="cadeira/{{ $cadeira->id }}"> {{ $cadeira->nome }} </a> </li>
        @endforeach
    </ul>
@endsection