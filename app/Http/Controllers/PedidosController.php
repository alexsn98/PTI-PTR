<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PedidoMudancaTurma;
use App\PedidoReservaSala;
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
            'descricao' => request('request')
        ]);
            
        return redirect()->back();
    }

    public function aprovarReservaSala($idPedido) {
        $pedido = PedidoReservaSala::find($idPedido);

        
        
        $pedido->delete();

        return redirect()->back();
    }
}
