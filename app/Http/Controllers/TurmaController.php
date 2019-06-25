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
        $salas = Sala::where('num_lugares','>=',$turma->num_vagas)->get();

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
                'numSala' => $sala->num_sala,
                'dia' => ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta'][$aulaTipo->dia_semana-1]
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
        $aluno = Auth::user()->aluno;
        $turma = Turma::find($idTurma);

        //devolve cadeira
        $cadeira = $turma->cadeira_id; 

        if ($turma->num_alunos_inscritos < $turma->num_vagas) {
            $semTurmaPratica = $aluno->cadeiras()->where('cadeira_id',$cadeira)->first()->pivot->turma_pratica_id == null;
            $semTurmaTeorica = $aluno->cadeiras()->where('cadeira_id',$cadeira)->first()->pivot->turma_teorica_id == null;
    
            if ($semTurmaPratica && $turma->tipo == 0) {
                $aluno->cadeiras()->updateExistingPivot($cadeira, ["turma_pratica_id" => $idTurma]);
    
                $turma->num_alunos_inscritos += 1;
                $turma->save();
            } 
            
            else if ($semTurmaTeorica && $turma->tipo == 1) {
                $aluno->cadeiras()->updateExistingPivot($cadeira, ["turma_teorica_id" => $idTurma]);
    
                $turma->num_alunos_inscritos += 1;
                $turma->save();
            }
            
            else {
                PedidoMudancaTurma::create([ 
                    'utilizador_abrir_id' => Auth::id(),
                    'utilizador_fechar_id' => Turma::find($idTurma)->docente->utilizador_id,
                    'turma_pedida_id' => $idTurma
                ]);
            }
        }
                
        return redirect("home/cadeira/$cadeira");
    }

    public function fecharTurma($idTurma) {
        $turma = Turma::find($idTurma);

        $turma->delete();

        return redirect()->back();
    }
}
