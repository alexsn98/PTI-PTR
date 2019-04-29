@extends('homeLayout')

@section('content')
    <h2>Nome da cadeira - {{$cadeira->nome}}</h2>

    <h2> Turmas </h2>
    <ul>
        @foreach ($turmas as $turma)
            <li> <a href="turma/{{$turma->id}}"> TP-{{$turma->numero}} 
                
            @if (App\Utilizador::find(Auth::id())->aluno && in_array($turma->id, $turmasAtuais))
                - Turma Atual 
            @endif
                
            </a> </li>
        @endforeach
    </ul>

    <h2>Regente- {{$regente}}</h2>

    <h2>Aulas Realizadas</h2>

    @if (App\Utilizador::find(Auth::id())->aluno)
        @foreach ($aulasRealizadas as $aulaTipoRealizada)
            @foreach ($aulaTipoRealizada as $aulaRealizada)
                {{$aulaRealizada->data}}               
                @if (in_array($aulaRealizada, $aulasAssistidas))
                    - Presente
                @endif
                <br>
            @endforeach
        @endforeach
    @endif

    @if (App\Utilizador::find(Auth::id())->admistrador)
        <br>
        <h4>Criar Turma: </h4>

        {{-- formulario para criar turma --}}
        <form action="/criar/turma/{{$cadeira->id}}" method="POST">
            @csrf

            <div class="form-group">
                <input type="number" class="form-control" name="numeroTurma" placeholder="Número da Turma" required>
            </div>

            <div class="form-group">
                <label>
                    Regente: 
                    <select name="regente">
                        @foreach (App\Docente::all() as $docente)
                            <option value="{{$docente->id}}"> {{$docente->Utilizador->nome}} </option>
                        @endforeach    
                    </select>
                </label>
            </div>
            
            <div class="form-group">
                <input type="number" class="form-control" name="vagas" placeholder="Número de Vagas" required >
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    @endif
    
@endsection