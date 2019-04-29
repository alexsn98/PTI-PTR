@extends('homeLayout')

@section('content')
    <h3>Disciplina: {{$aula->aulaTipo->turma->cadeira->nome}}</h3>

    <h3>Alunos inscritos</h3>
    <form action="{{$aula->id}}/submeterPresencas/" method="POST">
        @csrf

        @foreach ($alunosInscritos as $aluno)
            <label> 
                {{$aluno->utilizador->nome}} Nº {{$aluno->numero}}
                <input type="checkbox" name="{{$aluno->id}}" 
                    @if (in_array($aluno, $alunosPresentes))
                        checked
                    @endif
                > 
            </label>    
            <br>
        @endforeach

        <button type="submit" class="btn btn-primary">Submeter</button>
    </form>
@endsection