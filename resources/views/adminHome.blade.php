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
            <li> <a href="cadeira/{{ $cadeira->id }}"> {{ $cadeira->nome }} </a> </li>
        @endforeach
    </ul>
    <br>
    
    <h4>Criar Curso: </h4>
    <form action="/criar/curso" method="POST">
        @csrf

        <div class="form-group">
            <input type="text" class="form-control" name="coordenador" placeholder="Coordenador">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="nome" placeholder="Nome">
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>

    <br>

    <h4>Criar Cadeira: </h4>
    <form action="/criar/cadeira" method="POST">
        @csrf

        <div class="form-group">
            <input type="text" class="form-control" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="etcs" placeholder="Número de ETCs">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="regente" placeholder="Regente">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="curso" placeholder="Curso">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="semestre" placeholder="Semestre">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="ciclo" placeholder="Ciclo">
        </div>
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
@endsection