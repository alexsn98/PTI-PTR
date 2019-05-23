@extends('layout')

@section('name', 'Admin Salas')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/alunoCadeira.css') }}> 
@endsection

@section('cadeirasAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="title2">
        <h3>Cadeiras inscrito: </h3>
    </div>
    <hr style="height: 1px; border:0; width: 98%; color:#333;background-color:#03353E; margin-left:1%; margin-top: 0%;">
    <ul>
        @foreach ($cadeiras as $cadeira)
            <a class="this" href="/home/cadeira/{{ $cadeira->id }}"> <li> {{ $cadeira->nome }} </li> </a>
        @endforeach
    </ul>
@endsection