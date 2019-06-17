@extends('layout')

@section('name', 'Falco Aula')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/aula.css') }}> 
@endsection

@section('content')
    <h3>
        <span class="aulaHeader"> Turma: </span> 
        {{$aula->aulaTipo->turma->cadeira->nome}}  
        {{$aula->aulaTipo->turma->numero}}
        <br>
        <span class="aulaHeader"> Data: </span> 
        {{$aula->data}}
    </h3>

    <h3 class="this">Alunos inscritos: </h3>
    <div id="alunosLista">
        <form action="{{$aula->id}}/submeterPresencas/" method="POST">
            @csrf

            <div>
                @foreach ($alunosInscritos as $aluno)
                    <label> 
                        {{$aluno->utilizador->nome}}
                        <input type="checkbox" name="{{$aluno->id}}" 
                            @if (in_array($aluno, $alunosPresentes))
                                checked
                            @endif
                        > 
                    </label>    
                    <br>
                @endforeach
            </div>
            
            <button type="submit" class="btn btn-primary">Submeter</button>
        </form>
    </div>
@endsection