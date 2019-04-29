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

        $aulasRealizadas = $cadeira->aulasTipo->map(function ($aulaTipo) {
            return $aulaTipo->aulas;
        });

        $cadeiraInfo["aulasRealizadas"] = $aulasRealizadas;

        if (Utilizador::find(Auth::id())->aluno) {
            $aluno = Utilizador::find((Auth::id()))->aluno;
            $alunoCadeira = $aluno->cadeiras->find($id)->pivot;

            $turmaTeorica = $alunoCadeira->turma_teorica_id;
            $turmaPratica = $alunoCadeira->turma_pratica_id;

            $cadeiraInfo["turmasAtuais"] = [$turmaTeorica, $turmaPratica];           

            $aulasAssistidas = [];
            
            foreach ($aluno->presencas as $presenca) {
                $aulasAssistidas[] = $presenca->aula;
            }

            $cadeiraInfo["aulasAssistidas"] = $aulasAssistidas;
        }

        return view('cadeira')->with($cadeiraInfo);
    } 
}
