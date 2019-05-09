@extends('layout')

@section('name', 'Aluno Home')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/alunoHome.css') }}>
@endsection

@section('homeAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <h1> Horário </h1>

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
                <th>8:00</th>
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>8:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>9:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>9:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>10:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>10:30</th>
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor 
            </tr>
            <tr>
                <th>11:00</th>
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor 
            </tr>
            <tr>
                <th>11:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>12:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>12:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>13:30</th>
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor 
            </tr>
            <tr>
                <th>14:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>14:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>15:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>15:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>16:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>16:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>17:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>17:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>18:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>18:30</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
            <tr>
                <th>19:00</th> 
                @for ($i = 0; $i < 6; $i++)
                    <td></td>
                @endfor
            </tr>
        </tbody>
    </table>
    <script src="{{asset('js/alunoScript.js')}}"></script>
@endsection