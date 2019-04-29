@extends('homeLayout')

@section('cssPage')
    <link rel="stylesheet" href={{asset('css/adminCursos.css')}}>
@endsection

@section('content')
    <div id="title">
        <h1>Admin - Cursos</h1>
    </div>
    <div id="container">
        <div id="view">
            <ul>
                @foreach ($cursos as $curso)
                    <li><span>{{$curso->nome}}</span></li>
                @endforeach
            </ul>
        </div>
        <div id="create">
            <h1>Criar Curso: </h1>
            <form action="/criar/curso" method="POST">
                @csrf

                <div class="form-group">
                    <label>
                        Coordenador: 
                        <select name="coordenador">
                            @foreach ($utilizadores as $utilizador)
                                @if ($utilizador->docente)
                                    <option value="{{$utilizador->docente->id}}"> {{$utilizador->nome}} </option>
                                @endif
                            @endforeach    
                        </select>
                    </label>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                </div>
                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>
    </div>
@endsection