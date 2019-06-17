@extends('layout')

@section('name', 'Falco Aula')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/aula.css') }}> 
@endsection

@section('content')

    <div class="alunosLista">
        <h3 class="this">Alunos inscritos: </h3>
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

    <div class="alunosLista">
            <ul>
                <li>  
                    <span class="aulaHeader"> Turma: </span> {{$aula->aulaTipo->turma->cadeira->nome}}
                    
                    @if ($aula->aulaTipo->turma->tipo == 0)
                        TP -
                    @else
                        T -
                    @endif  
                    {{$aula->aulaTipo->turma->numero}}
                </li>
                <li> <span class="aulaHeader"> Data: </span> {{$aula->data}} </li>
                <li> <span class="aulaHeader"> Inicio: </span> {{$aula->aulaTipo->inicio}} </li>
                <li> <span class="aulaHeader"> Fim: </span> {{$aula->aulaTipo->fim}} </li>
                <li> <span class="aulaHeader"> Sumário: </span> {{$aula->sumario}} </li>
            </ul>
        </div>

@endsection