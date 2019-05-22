@extends('layout')

@section('name', 'Admin Utilizadores')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminCadeira.css') }}>
    <link rel="stylesheet" href= {{ asset('css/cadeira.css') }}>
@endsection

@section('cadeirasAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <h2>{{$cadeira->nome}}</h2>
    <h2>Regente: {{$regente}}</h2>

    <div id="leftContent">
        <div id="view">
            <h2> Turmas </h2>
            <ul>
                @foreach ($turmas as $turma)
                    <li class="this" onclick="selecionarTurma({{$turma->id}})"> 
                        <a href="turma/{{$turma->id}}"> TP-{{$turma->numero}} 
                            {{-- Se for a turma atual --}}
                            @if (Auth::user()->aluno && in_array($turma->id, $turmasAtuais))
                                - Turma Atual 
                            @endif    
                        </a> 
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div id="rightContent">
        <div id="theCadeira">
            <div id="left">
                <h4>Professor:</h4>
            </div>
            <div id="right">
                <h4>Tipo:</h4>
            </div>
        </div>
        <div id="view1">
            <div></div>
            <div>
                <a class="btn btn-primary">Inscrever na turma</a>
            </div>
        </div>
    </div>

    @if (Auth::user()->docente)
        <h2>Alunos sem Turma</h2>
        @foreach ($alunosSemTurma as $aluno)
            {{$aluno->utilizador->nome}} - {{$aluno->numero}}
        @endforeach
    @endif

    
    {{-- @if (Auth::user()->aluno)
        <h2>Aulas Realizadas</h2>
    
        @foreach ($aulasRealizadas as $aulaTipoRealizada)
            @foreach ($aulaTipoRealizada as $aulaRealizada)
                {{$aulaRealizada->data}}               
                @if (in_array($aulaRealizada, $aulasAssistidas))
                    - Presente
                @endif
                <br>
            @endforeach
        @endforeach
    @endif --}}

    @if (Auth::user()->admistrador)
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
    <script src="{{asset('js/alunoScript.js')}}"></script>
@endsection