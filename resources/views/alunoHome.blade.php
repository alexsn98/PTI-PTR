@extends('homeLayout')

@section('cssPage')
    <link rel="stylesheet" href={{ asset('css/alunoHome.css') }}>
@endsection

@section('content')
<h1> Aluno </h1>

<ul>

    {{ $cadeiras }}
    {{-- @foreach ($cadeiras as $cadeira)

        <li> {{ $cadeira }} </li>

    @endforeach --}}

</ul>


@endsection