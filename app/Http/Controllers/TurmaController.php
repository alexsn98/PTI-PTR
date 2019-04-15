<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;
use App\Utilizador;
use App\Cadeira;
use App\Sala;
use App\PedidoMudancaTurma;
use Auth;

class TurmaController extends Controller
{
    public function getTurma($id) {
        $turma = Turma::find($id);
        $docente = $turma->docente;

        $aulasTipo = [];

        foreach ($turma->aulasTipo->all() as $aulaTipo) {
            $sala = Sala::find($aulaTipo->sala_id);
            
            $aulaTipo = [
                'inicio' => $aulaTipo->inicio,
                'fim' => $aulaTipo->fim,
                'edificio' => $sala->edificio,
                'piso' => $sala->piso,
                'numSala' => $sala->num_sala
            ];

            $aulasTipo[] = $aulaTipo;
        }

        return view('turma')->with([
            'turma' => $turma,
            'docente' => $docente,
            'aulasTipo' => $aulasTipo
            ]);
    }

    public function inscrever($id) {
        //devolve aluno autenticado
        $aluno = Utilizador::find((Auth::id()))->aluno;

        //devolve cadeira
        $cadeira = Turma::find($id)->cadeira_id; 

        $jaInscrito = $aluno->cadeiras()->where('cadeira_id',$cadeira)->first()->pivot->turma_pratica_id != null;

        if ($jaInscrito) {
            PedidoMudancaTurma::create([ 
                'utilizador_abrir_id' => Auth::id(),
                'utilizador_fechar_id' => Turma::find($id)->docente->utilizador_id,
                'turma_pedida_id' => $id
            ]);
        }
        
        else {
            //update do pivot aluno cadeira
            $aluno->cadeiras()->updateExistingPivot($cadeira, ["turma_pratica_id" => $id]);
        }

        return redirect("home/cadeira/$cadeira");
    }
}
