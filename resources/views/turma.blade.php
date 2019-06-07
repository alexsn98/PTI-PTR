@extends('layout')

@section('name', 'Falco Turma')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/adminCadeira.css') }}>
    <link rel="stylesheet" href={{asset('css/turma.css')}}>
@endsection

@section('content')
    <div id="turmaInfo">
        <h2>Número turma: {{$turma->numero}}</h2>
        <h2>Vagas: {{$turma->numVagas}} </h2>
    </div>
    
    <div id="leftContent">
        <div id="view">
            <h2>Aulas Tipo</h2>
            <ul>
                @for ($i = 0; $i < count($aulasTipo); $i++)
                    <li class="this">
                        Dia: {{$aulasTipo[$i]['dia']}}
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
                <ul>
                    @foreach ($aulas as $aula)
                    <li>
                        Data: {{$aula->data}} <br>
                        Sumário: {{$aula->sumario}} <br>
            
                        @if (Auth::user()->docente)
                            <a href="aula/{{$aula->id}}">Presenças</a>
                        @endif 
                    </li>
                    @endforeach
                </ul>
            </div>
            <div>
                {{-- Se utilizador for admistrador --}}
                @if (Auth::user()->admistrador)
                    <h3>Criar aula tipo</h3>
    
                    {{-- formulario para criar aula tipo --}}
                    <form action="/criar/aulaTipo/{{$turma->id}}" method="POST">
                        @csrf
    
                        {{-- <div class="form-group">
                            <label>
                                Sala: 
                                <select name="sala">
                                    @foreach ($salas as $sala)
                                        <option value="{{$sala->id}}"> {{$sala->edificio}}.{{$sala->piso}}.{{$sala->num_sala}} </option>
                                    @endforeach    
                                </select>
                            </label>
                        </div> --}}

                        <script type="text/javascript">
                            var salas = @json($salas);
                        </script>

                        <div class="form-group">
                            <label>
                                Edificio: 
                                <select name="edificio">
                                    @foreach ($salas as $sala)
                                        <option value="{{$sala->edificio}}"> {{$sala->edificio}}</option>
                                    @endforeach    
                                </select>
                            </label>
                            <label>
                                Piso: 
                                <select name="piso">
                                    @foreach ($salas as $sala)
                                        <option value="{{$sala->piso}}"> {{$sala->piso}}</option>
                                    @endforeach    
                                </select>
                            </label>
                            <label>
                                Sala: 
                                <select name="sala">
                                    @foreach ($salas as $sala)
                                        <option value="{{$sala->num_sala}}"> {{$sala->num_sala}}</option>
                                    @endforeach    
                                </select>
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
                @if (App\Utilizador::find(Auth::id())->docente)
                    <h3>Criar aula:</h3>
    
                    {{-- formulario para criar aula --}}
                    <form action="/criar/aula" method="POST">
                        @csrf 
    
                        <div class="form-group">
                            <label>
                                Aula-Tipo:
                                <select name="aulaTipo">
                                    @foreach ($aulasTipo as $aula)
                                        <option value="{{$aula['id']}}"> {{$aula['inicio']}}-{{$aula['fim']}} </option>
                                    @endforeach    
                                </select>
                            </label>
                        </div>
    
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
        </div>
    </div>
    <script src="{{asset('js/turmaScript.js')}}"></script>
@endsection