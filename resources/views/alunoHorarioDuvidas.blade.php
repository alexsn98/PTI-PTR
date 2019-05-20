@extends('layout')

@section('name', 'Admin Ajuda')

@section('cssPagina')
    {{-- <link rel="stylesheet" href= {{ asset('css/adminSalas.css') }}> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.20.0/slimselect.min.css" rel="stylesheet"></link>
@endsection

@section('horarioDuvidasAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <form action="/pedido/reservaHorario/criar" method="POST">
        @csrf

        <div class="form-group">
            <textarea rows="4" cols="30" name="textoPedido">
                Texto adicional...
            </textarea>
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
                Coordenador: 
                <select name="docente">
                    @foreach ($docentes as $docente)
                        <option value="{{$docente->id}}"> {{$docente->utilizador->nome}} </option>
                    @endforeach    
                </select>
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
    <script src="{{asset('js/selectSearch.js')}}"></script>
@endsection