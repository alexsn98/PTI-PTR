@extends('layout')

@section('name', 'Aluno Home')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/alunoHome.css') }}>
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
    <div id="div1">
    </div>
    <div id="div2">
    </div>
    <script src="{{asset('js/alunoScript.js')}}"></script>
@endsection