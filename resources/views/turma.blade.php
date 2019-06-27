@extends('layout')

@section('name', 'Falco Turma')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminCadeira.css') }}>
    <link rel="stylesheet" href={{asset('css/turma.css')}}>
@endsection

@section('content')
    <div id="leftContent">
            <div id="turmaInfo">
                <h2>Aulas Tipo:</h2>
                <h2>Turma
                    @if ($turma->tipo == 1)
                        Teórica
                    @else
                        Prática
                    @endif
                    {{$turma->numero}}
                </h2>
                <h2>Vagas: {{$turma->num_vagas - $turma->num_alunos_inscritos}} </h2>
            </div>
        <div id="view">
            <ul>
                @for ($i = 0; $i < count($aulasTipo); $i++)
                    <li class="this" onclick="selecionarAulaTipo({{$aulasTipo[$i]['id']}})">
                        Dia: {{$aulasTipo[$i]['dia']}}-Feira
                        Inicio: {{$aulasTipo[$i]['inicio']}}
                        Fim: {{$aulasTipo[$i]['fim']}}
                        Sala: {{$aulasTipo[$i]['edificio']}}.{{$aulasTipo[$i]['piso']}}.{{$aulasTipo[$i]['numSala']}}</td>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
    
    <div id="rightContent">
        <div id="view1">
            <div id="theCadeira">
                <h2> Aulas </h2>
                <ul> </ul>
            </div>
            @if (Auth::user()->docente || Auth::user()->admistrador)
                <div>
                    {{-- Se utilizador for admistrador --}}
                    @if (Auth::user()->admistrador)
                        <h3>Criar aula tipo</h3>
        
                        {{-- formulario para criar aula tipo --}}
                        <form action="/criar/aulaTipo/{{$turma->id}}" method="POST" id="criarAulaTipo">
                            @csrf
    
                            <div class="form-group">
                                <label>
                                    Edificio: 
                                    <select name="edificio" onchange="selecionarSala('edificio')">
                                        @for ($i = 1; $i < 7; $i++)
                                            <option value="{{$i}}"> {{$i}}</option>
                                        @endfor
                                    </select>
                                </label>
                                <label>
                                    Piso: 
                                    <select name="piso" onchange="selecionarSala('piso')"></select>
                                </label>
                                <label>
                                    Sala: 
                                    <select name="sala"></select>
                                </label>
                            </div>
        
                            <div class="form-group">
                                <label>
                                    Dia da semana:
                                    <select name="diaSemana">
                                        <option value=1> Segunda-Feira </option>
                                        <option value=2> Terça-Feira </option>
                                        <option value=3> Quarta-Feira </option>
                                        <option value=4> Quinta-Feira </option>
                                        <option value=5> Sexta-Feira </option>
                                    </select>
                                </label>
                            </div>
        
                            <div class="form-group"> Hora de inicio:
                                <input type="time" class="form-control" name="inicio" >
                            </div>
                            <div class="form-group"> Hora de fim:
                                <input type="time" class="form-control" name="fim" >
                            </div>
                            <button type="submit" class="btn btn-primary">Criar</button>
                        </form>
                    @endif
        
                    {{-- Se utilizador for docente --}}
                    @if (Auth::user()->docente)
                        <h3>Criar aula:</h3>
        
                        {{-- formulario para criar aula --}}
                        <form action="/criar/aula" method="POST" id="criarAula">
                            @csrf 
                            
                            <input name="aulaTipo" hidden>
        
                            <div class="form-group"> Data:
                                <input type="date" class="form-control" name="data" >
                            </div> 
        
                            <div class="form-group"> Sumário:
                                <input type="text" class="form-control" name="sumario" >
                            </div> 
        
                            <button type="submit" class="btn btn-primary">Criar</button>
                        </form>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <script type="text/javascript"> var utilizadorAluno = @json(Auth::user()->aluno); </script>
    <script type="text/javascript"> var utilizadorDocente = @json(Auth::user()->docente); </script>
    <script type="text/javascript"> var salas = @json($salas); </script>
    <script src="{{asset('js/turmaScript.js')}}"></script>
@endsection