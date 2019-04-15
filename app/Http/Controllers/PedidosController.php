<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PedidoMudancaTurma;

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
}
