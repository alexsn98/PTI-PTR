@extends('layout')

@section('name', 'Admin Cursos')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminCurso.css') }}>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.css" rel="stylesheet"></link>
@endsection

@section('cursosAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="leftContent">
        <div id="filtrar">
            <h3>Pesquisar:</h3>
            <input id="searchBar" type="text" id="searchBar" onkeyup="pesquisarUtilizadores()" placeholder="Pesquisar nome..">
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
                    <label style="margin-top:-2%;">
                        Nome:
                        <input type="text" class="form-control" name="nome" required>
                    </label>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="faculdade" placeholder="Faculdade" required>
                </div>

                <div class="form-group">
                    <label style="margin-top:0%;">
                        Ano letivo:
                        <select name="anoLetivo">
                            <option value='2018/2019'> 2018/2019 </option>
                            <option value='2019/2020'> 2019/2020 </option>
                            <option value='2020/2021'> 2020/2021 </option>
                            <option value='2021/2022'> 2021/2022 </option>
                            <option value='2022/2023'> 2022/2023 </option>
                            <option value='2023/2024'> 2023/2024 </option>
                        </select>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>
        <div id="viewCurso">
            <h3>Nome:</h3>
            <h3>Coordenador:</h3>
            <h3>Faculdade:</h3>
            <h3>Cadeiras:</h3>
        </div>
    </div>
    <script src="{{asset('js/adminScript.js')}}"></script>
    <script src="{{asset('js/selectSearch.js')}}"></script>
@endsection