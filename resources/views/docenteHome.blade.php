@extends('layout')

@section('name', 'Docente Home')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/docenteHome.css') }}>
@endsection

@section('homeAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
<div id="title1">
        <h2>Horário</h2>
    </div>

    <table id="horario">
        <thead>
            <tr>
                <th>Horas/Dia</th>
                <th>Segunda-Feira</th>
                <th>Terça-Feira</th>
                <th>Quarta-Feira</th>
                <th>Quinta-Feira</th>
                <th>Sexta-Feira</th>
                <th>Sábado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>8:00 - 8:30</th>
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>8:30 - 9:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>9:00 - 9:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>9:30 - 10:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>10:00 - 10:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>10:30 - 11:00</th>
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor 
            </tr>
            <tr>
                <th>11:00 - 11:30</th>
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor 
            </tr>
            <tr>
                <th>11:30 - 12:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>12:00 - 12:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>12:30 - 13:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>13:00 - 13:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>13:30 - 14:00</th>
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor 
            </tr>
            <tr>
                <th>14:00 - 14:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>14:30 - 15:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>15:00 - 15:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>15:30 - 16:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>16:00 - 16:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>16:30 - 17:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>17:00 - 17:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>17:30 - 18:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>18:00 - 18:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>18:30 - 19:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
        </tbody>
    </table>
    <div id="pedidosTurma">
        <h3> Pedidos de mudanca de turma: </h3>
        <ul>
            @foreach ($pedidosMudancaTurma as $pedido)
                <li> 
                    Pedido feito por: {{$pedido->aluno->utilizador->nome}} <br>
                    Cadeira: {{$pedido->turmaPedida->cadeira->nome}} <br>
                    Para a turma: TP-{{$pedido->turmaPedida->numero}} <br>
                    <a href="/pedido/mudancaTurma/{{$pedido->id}}">Aceitar</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div id="avisos">
            <h3> Avisos: </h3>
            <ul>
                @foreach ($alunosSemTurma as $alunoSemTurma)
                    <li class="this1"> 
                        Aluno: {{$alunoSemTurma['aluno']}} ||
                        Cadeira: {{$alunoSemTurma['cadeira']}}
                    </li>
                @endforeach
            </ul>
        </div>

    <script>var idDocente = @json(Auth::user()->docente->id)</script>
    <script src="{{asset('js/horarioScript.js')}}"></script>
@endsection