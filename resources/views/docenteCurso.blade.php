@extends('layout')

@section('name', 'Docente Curso')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminCadeira.css') }}>
    <link rel="stylesheet" href= {{ asset('css/docenteCurso.css') }}>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.css" rel="stylesheet"></link>
@endsection

@section('cursoAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="title2">
        <h2> 
            <span> Coordenador do Curso: </span> {{$curso->nome}}
        </h2>
        <h2>Cadeiras do curso: </h2>
        <ul>
           @foreach ($curso->cadeiras as $cadeira)
                <a class="this" href="/home/cadeira/{{$cadeira->id}}"><li>{{$cadeira->nome}}</li></a>
           @endforeach 
        </ul>
    </div>
@endsection