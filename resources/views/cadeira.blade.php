@extends('layout')

@section('name', 'Falco Cadeira')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminCadeira.css') }}>
    <link rel="stylesheet" href= {{ asset('css/cadeira.css') }}>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.css" rel="stylesheet"></link>
@endsection

@section('cadeirasAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="cadeiraInfo">
        <h2>{{$cadeira->nome}}</h2>
        <h2>Regente: {{$regente}}</h2>
    </div>

    <div id="leftContent">
        <div id="view">
            <h2> Turmas </h2>
            <ul>
                @foreach ($turmas as $turma)
                    <li class="this" onclick="selecionarTurma({{$turma->id}})"> 
                        @if ($turma->tipo == 0)
                            Teórica-Prática
                        @else
                            Teórica
                        @endif
                        
                        -{{$turma->numero}}
                        {{-- Se for a turma atual --}}
                        @if (Auth::user()->aluno && in_array($turma->id, $turmasAtuais))
                            - Turma Atual 
                        @endif  
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
                @if (Auth::user()->aluno)
                    <a id="inscreverTurmaButton" class="btn btn-primary">Inscrever na turma</a>
                @endif
                
                <a id="paginaTurmaButton" class="btn btn-primary">Página da turma</a>
            </div>
        </div>
        @if (Auth::user()->admistrador)
            <div id="criarTurma">
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
                            <select name="docente">
                                @foreach ($docentes as $docente)
                                    <option value="{{$docente->id}}"> {{$docente->Utilizador->nome}} </option>
                                @endforeach    
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                            <label>
                                Tipo: 
                                <select name="tipo">
                                    <option value="0"> Teórica-prática </option>
                                    <option value="1"> Teórica </option>
                                </select>
                            </label>
                        </div>
                    
                    <div class="form-group">
                        <input type="number" class="form-control" name="vagas" placeholder="Número de Vagas" required >
                    </div>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </form>
            </div>

            <script src="{{asset('js/selectSearch.js')}}"></script>
        @endif
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

    @if (Auth::user()->aluno)
        <script> var turmasAtuais = @json($turmasAtuais)</script>
    @endif

    <script src="{{asset('js/cadeiraScript.js')}}"></script>
@endsection