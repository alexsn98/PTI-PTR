<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;
use App\Utilizador;
use App\Cadeira;
use App\Sala;
use App\Aula;
use App\PedidoMudancaTurma;
use Auth;

class TurmaController extends Controller
{
    public function getTurma($idTurma) {
        $turma = Turma::find($idTurma);
        $docente = $turma->docente;
        $salas = Sala::all();
        $aulasTipo = $turma->aulasTipo;
        $aulasTipoInfo = [];

        foreach ($aulasTipo as $aulaTipo) {
            $sala = Sala::find($aulaTipo->sala_id);
            
            $aulaTipoInfo = [
                'id' => $aulaTipo->id,
                'inicio' => $aulaTipo->inicio,
                'fim' => $aulaTipo->fim,
                'edificio' => $sala->edificio,
                'piso' => $sala->piso,
                'numSala' => $sala->num_sala
            ];

            $aulasTipoInfo[] = $aulaTipoInfo;
        }

        $aulas = Aula::all()->filter(function ($aula) use ($aulasTipo) {
            return $aulasTipo->contains($aula->aulaTipo);
        });

        return view('turma')->with([
            'turma' => $turma,
            'docente' => $docente,
            'aulasTipo' => $aulasTipoInfo,
            'salas' => $salas,
            'aulas' => $aulas
        ]);
    }

    public function inscrever($idTurma) {
        //devolve aluno autenticado
        $aluno = Utilizador::find((Auth::id()))->aluno;

        //devolve cadeira
        $cadeira = Turma::find($idTurma)->cadeira_id; 

        $jaInscrito = $aluno->cadeiras()->where('cadeira_id',$cadeira)->first()->pivot->turma_pratica_id != null;

        if ($jaInscrito) {
            PedidoMudancaTurma::create([ 
                'utilizador_abrir_id' => Auth::id(),
                'utilizador_fechar_id' => Turma::find($idTurma)->docente->utilizador_id,
                'turma_pedida_id' => $id
            ]);
        }
        
        else {
            //update do pivot aluno cadeira
            $aluno->cadeiras()->updateExistingPivot($cadeira, ["turma_pratica_id" => $id]);
        }

        return redirect("home/cadeira/$cadeira");
    }

    public function fecharTurma($idTurma) {
        $turma = Turma::find($idTurma);

        $turma->delete();

        return redirect()->back();
    }
}
