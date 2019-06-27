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
    public function associarDocenteTurma() {
        $utilizador = Utilizador::find(request('utilizador'));
        $cadeira = Cadeira::find(request('cadeira'));
        $turma = Turma::find(request('turma'));

        $turma->docente_id = $utilizador->docente->id;
        $turma->save();

        return redirect()->back();
    }

    public function aprovarMudancaTurma($idPedido) {
        $pedido = PedidoMudancaTurma::find($idPedido);
        
        $aluno = $pedido->aluno;
        $turma = $pedido->turmaPedida;
        $cadeira = $turma->cadeira;

        if ($pedido->turmaPedida->tipo == 0) {
            $aluno->cadeiras()->updateExistingPivot($cadeira, ["turma_pratica_id" => $pedido->turma_pedida_id]);
        }
        
        else {
            $aluno->cadeiras()->updateExistingPivot($cadeira, ["turma_teorica_id" => $pedido->turma_pedida_id]);
        }

        $turma->num_alunos_inscritos += 1;

        $turma->save();

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
