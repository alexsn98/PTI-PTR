<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilizador;
use App\Cadeira;
use App\Turma;
use App\PedidoMudancaTurma;
use App\PedidoReservaSala;
use App\ReservaSala;
use App\HorarioDuvidas;
use App\PedidoAjuda;
use Auth;

class PedidosController extends Controller
{
    public function associarUtilizadorTurma() {
        $utilizador = Utilizador::find(request('utilizador'));
        $turma = Cadeira::find(request('cadeira'));
        $cadeira = Turma::find(request('turma'));

        if ($utilizador->docente) {
            $turma->docente_id = $utilizador->docente->id;
            $turma->save();
        } 
        
        else if ($utilizador->aluno) {
            $alunoPivot = $utilizador->aluno->cadeiras();

            if ($turma->tipo == 0) {
                $alunoPivot->updateExistingPivot($cadeira, ["turma_pratica_id" => $turma->id]);
            }

            else {
                $alunoPivot->updateExistingPivot($cadeira, ["turma_teorica_id" => $turma->id]);
            }
        }

        return redirect()->back();
    }

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
            'data' => request('data'),
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
            'fim' => $pedido->fim,
            'data' => $pedido->data
        ]);
        
        $pedido->delete();

        return redirect()->back();
    }

    public function criarReservaHorario() {
        HorarioDuvidas::create([ 
            'aluno_id' => Auth::user()->aluno->id,
            'docente_id' => request('docente'),
            'dia' => request('data'),
            'inicio' => request('inicio'),
            'fim' => request('fim') 
        ]);
            
        return redirect()->back();
    }

    public function criarPedidoAjuda() {
        PedidoAjuda::create([ 
            'utilizador_id' => Auth::user()->id,
            'texto_pedido' => request('textoPedido'),
            'resposta' => null
        ]);
            
        return redirect()->back();
    }

    public function responderPedidoAjuda($idPedido) {
        $pedido = PedidoAjuda::find($idPedido);
        
        $pedido->resposta = request('textoResposta');

        $pedido->save();

        return redirect()->back();
    }
}
