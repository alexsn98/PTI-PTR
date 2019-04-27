<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cadeira;
use App\Utilizador;
use Auth;

class CadeiraController extends Controller
{
    public function getCadeira($id) {
        $cadeiraInfo = [];

        $cadeira =  Cadeira::find($id);

        $cadeiraInfo["cadeira"] = $cadeira;
        $cadeiraInfo["turmas"] = $cadeira->turmas;

        $cadeiraInfo["regente"] = $cadeira->regente->utilizador->nome;

        $aulasRealizadas = [];

        foreach ($cadeira->turmas as $turma) {
            $aulasTipo = $turma->aulasTipo;
            
            foreach ($aulasTipo as $aulaTipo) {
                $aulas = $aulaTipo->aulas;

                $aulasRealizadas[] = $aulas;
            }
        }

        $cadeiraInfo["aulasRealizadas"] = $aulasRealizadas;

        if (Utilizador::find(Auth::id())->aluno) {
            $aluno = Utilizador::find((Auth::id()))->aluno;
            $alunoCadeira = $aluno->cadeiras->find($id)->pivot;

            $turmaTeorica = $alunoCadeira->turma_teorica_id;
            $turmaPratica = $alunoCadeira->turma_pratica_id;

            $cadeiraInfo["turmasAtuais"] = [$turmaTeorica, $turmaPratica];           

            $cadeiraInfo["aulasAssistidas"] = $aluno->presencas;
        }

        return view('cadeira')->with($cadeiraInfo);
    } 
}
