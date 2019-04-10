@extends('homeLayout')

@section('cssPage')
    <link rel="stylesheet" href={{asset('css/turma.css')}}>
@endsection

@section('content')
    <h2>Número turma -> TP-{{$turma->numero}}</h2>
    <h2>Vagas -> {{$turma->numVagas}} </h2>

    @if (App\Utilizador::find(Auth::id())->aluno)
        <a href="inscreverTurma/{{$turma->id}}">Inscrever</a>
    @endif

    <h3> Aulas: </h3>
 
    <table>
        <tr>
            <th>Inicio</th>
            <th>Fim</th>
            <th>Sala</th>
        </tr>

        @for ($i = 0; $i < count($aulasTipo); $i++)
            <tr>
                <td>{{$aulasTipo[$i]['inicio']}}</td>
                <td>{{$aulasTipo[$i]['fim']}}</td>
                <td>{{$aulasTipo[$i]['edificio']}}.{{$aulasTipo[$i]['piso']}}.{{$aulasTipo[$i]['numSala']}}</td>
            </tr>
        @endfor
    </table>

    @if (App\Utilizador::find(Auth::id())->admistrador)
        <h3>Criar aula tipo</h3>

        {{-- formulario para criar aula tipo --}}
        <form action="/criar/aulaTipo/{{$turma->id}}" method="POST">
            @csrf

            <div class="form-group">
                <input type="number" class="form-control" name="sala" placeholder="Sala">
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

            <div class="form-group">
                <input type="number" class="form-control" name="diaSemana" placeholder="Dia da semana" >
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
@endsection