<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PedidoMudancaTurma;
use App\PedidoReservaSala;
use App\ReservaSala;
use Auth;

class PedidosController extends Controller
{
    public function aprovarMudancaTurma($idPedido) {
        $pedido = PedidoMudancaTurma::find($idPedido);
        
        $aluno = $pedido->aluno;
        $cadeira = $pedido->turmaPedida->cadeira;

        $aluno->cadeiras()->updateExistingPivot($cadeira, ["turma_pratica_id" => $pedido->turma_pedida_id]);

        $pedido->delete();

        return redirect()->back();
    }

    public function criarReservaSala() {
        PedidoReservaSala::create([ 
            'utilizador_abrir_id' => Auth::id(),
            'sala_id' => request('sala'),
            'inicio' => request('inicio'),
            'fim' => request('fim'),
            'descricao' => request('descricao')
        ]);
            
        return redirect()->back();
    }

    public function aprovarReservaSala($idPedido) {
        $pedido = PedidoReservaSala::find($idPedido);

        ReservaSala::create([ 
            'sala_id' => $pedido->sala->id,
            'utilizador_id' => $pedido->utilizadorAbre->id, 
            'inicio' => $pedido->inicio,
            'fim' => $pedido->fim
        ]);
        
        $pedido->delete();

        return redirect()->back();
    }
}
