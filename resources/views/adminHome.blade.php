@extends('adminLayout')
@section('name', 'Admin Home')
@section('homeAtive') 
    style= "opacity: 1; background: rgba(255, 255, 255, 0.1); cursor: pointer;"
@endsection

@section('content')
    <div id="divsTotal">
        <div id="divTotalUsers">
            <div class="icon">
                <img src={{asset('img/team.png')}}>
            </div>
            <div class="text">
                <h2>Total Utilizadores</h2>
            </div>
            <div class="number">
                <h2>{{$utilizadoresNum}}</h2>
            </div>
        </div>
        <div id="divTotalCursos">
            <div class="icon">
                <img src={{asset('img/structure.png')}}>
            </div>
            <div class="text">
                <h2>Total Cursos</h2>
            </div>
            <div class="number">
                <h2>{{$cursosNum}}</h2>
            </div>
        </div>
        <div id="divTotalCadeiras">
            <div class="icon">
                <img src={{asset('img/clipboard.png')}}>
            </div>
            <div class="text">
                <h2>Total Cadeiras</h2>
            </div>
            <div class="number" >
                <h2>{{$cadeirasNum}}</h2>
            </div>
        </div>
    </div>
    <div id="divsOther">
        <div id="big">
            
        </div>
        <div id="divTotalSalas">
            <div id="reservas">
                <div class="header">
                    <div class="iconn">
                        <img src={{asset('img/res.png')}}>
                    </div>
                    <div class="tit">
                        <h4>Reservas Salas:</h4>
                    </div>
                </div>
                <div class="contai">
                    <h2>Total de reservas: 0</h2>
                </div>
            </div>
            <div id="pedidos">
                <div class="header">
                    <div class="iconn">
                        <img src={{asset('img/cur.png')}}>
                    </div>
                    <div class="tit">
                        <h4>Pedidos Salas:</h4>
                    </div>
                </div>
                <div class="contai1">
                    <h2>Total de pedidos: 0</h2>
                </div>
                <div class="hiperCont">
                    <div id="buttonIr">
                        <i class="material-icons" style="float:left; margin-top:10%; margin-left: 22%; color:white;">exit_to_app</i>
                        <h3 style="float:left;margin-top:4%; color:white;">IR</h3>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection