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
    
    {{-- formulario para criar curso --}}
    <h4>Criar Curso: </h4>
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

    <br>

    {{-- formulario para criar cadeira --}}
    <h4>Criar Cadeira: </h4>
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
@endsection