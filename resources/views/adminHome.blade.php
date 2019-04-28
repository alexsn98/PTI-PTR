@extends('homeLayout')

@section('cssPage')
    <link rel="stylesheet" href={{asset('css/adminHome.css')}}>
@endsection

@section('content')
    <div id="title">
        <h1>Admin - Home</h1>
    </div>
    <div id="container">
        <div id="divUser">
        </div>
        <div id="divCurso">
        </div>
        <div id="divCadeira">
        </div>
    </div>
@endsection