@extends('adminLayout')
@section('name', 'Admin Utilizadores')
@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminHome.css') }}>
    <link rel="stylesheet" href= {{ asset('css/adminCurso.css') }}>
@endsection

@section('cursosAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')

    <div id="leftContent">
        <div id="filtrar">
            <h2>Lista de Cursos:</h2>  
        </div>
        <div id="view">
            <ul>
                @foreach ($cursos as $curso)
                    <li class="this" onclick="selecionarCurso({{$curso->id}})"> {{$curso->nome}} </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="rightContent">
        <div id="filtrar"> 
            <h2>Criar Curso:</h2>     
        </div>
        <div id="view1">
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
                    <input type="text" class="form-control" name="nome" placeholder="Nome" pattern="[A-Za-z]+" required>
                </div>
                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>
        <div id="viewCurso">
            <h3>Nome:</h3>
            <h3>Coordenador:</h3>
            <h3>Cadeiras:</h3>
        </div>
    </div>
    <script src="{{asset('js/adminScript.js')}}"></script>
@endsection