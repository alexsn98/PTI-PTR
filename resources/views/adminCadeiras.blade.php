@extends('homeLayout')

@section('cssPage')
    <link rel="stylesheet" href={{asset('css/adminCadeira.css')}}>
@endsection

@section('content')
    <div id="title">
        <h1>Admin - Cadeiras</h1>
    </div>
    <div id="precontainer">
        <h3 id="filtrar">Filtrar:</h3>
        <select>
            
        </select>
    </div>
    <div id="container">
        <div id="view">
            <ul>
                @foreach ($cadeiras as $cadeira)
                    <li> <span><a href="cadeira/{{ $cadeira->id }}"> {{ $cadeira->nome }} </a></span></li>
                @endforeach
            </ul>
        </div>
        <div id="create">
            <h1>Criar Cadeira: </h1>
            <form action="/criar/cadeira" method="POST">
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                </div>

                <div class="form-group">
                    <input type="number" class="form-control" name="etcs" placeholder="Número de ETCs" required>
                </div>

                <div class="form-group">
                    <label>
                        Regente: 
                        <select name="regente">
                            @foreach ($utilizadores as $utilizador)
                                @if ($utilizador->docente)
                                    <option value="{{$utilizador->docente->id}}"> {{$utilizador->nome}} </option>
                                @endif
                            @endforeach    
                        </select>
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        Curso: 
                        <select name="curso">
                            @foreach ($cursos as $curso)
                                <option value="{{$curso->id}}"> {{$curso->nome}} </option>
                            @endforeach    
                        </select>
                    </label>
                </div>
                
                <div class="form-group">
                    <label>
                        Semestre:
                        <select name="semestre">
                            <option value=1> Primeiro semestre </option>
                            <option value=2> Segundo semestre </option>
                        </select>
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        Ciclo:
                        <select name="ciclo">
                            <option value=1> Primeiro ciclo </option>
                            <option value=2> Segundo ciclo </option>
                            <option value=3> Terceiro ciclo </option>
                        </select>
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary">Criar</button>
            </form>
        </div>
    </div>
@endsection