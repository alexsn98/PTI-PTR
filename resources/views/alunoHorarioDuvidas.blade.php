@extends('layout')

@section('name', 'Admin Ajuda')

@section('cssPagina')
    <link rel="stylesheet" href= {{ asset('css/alunoHorarioDuvidas.css') }}>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.css" rel="stylesheet"></link>
@endsection

@section('horarioDuvidasAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="title3">
        <h3>Marcação de horário de dúvidas: </h3>
    </div>
    <hr style="height: 1px; border:0; width: 98%; color:#333;background-color:#03353E; margin-left:1%; margin-top: 0%;">
    <div id="cont">
        <form action="/pedido/reservaHorario/criar" method="POST">
            @csrf
            <div class="form-group">
                <label>
                    Docente: 
                    <select name="docente">
                        @foreach ($docentes as $docente)
                            <option value="{{$docente->id}}"> {{$docente->utilizador->nome}} </option>
                        @endforeach    
                    </select>
                </label>
            </div>

            <div class="form-group">
                    <label> Dia:  
                        <input type="date" name="data" required>
                    </label>
                </div>

            <div class="form-group">
                <label> Hora de Inicio: 
                    <input type="time" name="inicio" required>
                </label>
            </div>

            <div class="form-group">
                <label> Hora de Fim: 
                    <input type="time" name="fim" required>
                </label>
            </div>
            <div class="form-group">
                <label>
                    Texto adicional:
                    <textarea rows="4" cols="30" name="textoPedido"> </textarea>
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
    <script src="{{asset('js/selectSearch.js')}}"></script>
@endsection