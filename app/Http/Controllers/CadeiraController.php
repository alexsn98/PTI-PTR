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

        if (Utilizador::find(Auth::id())->aluno) {
            $alunoCadeira = Utilizador::find((Auth::id()))->aluno->cadeiras->find($id)->pivot;

            $turmaTeorica = $alunoCadeira->turma_teorica_id;
            $turmaPratica = $alunoCadeira->turma_pratica_id;

            $cadeiraInfo["turmasAtuais"] = [$turmaTeorica, $turmaPratica];
        }

        $cadeira =  Cadeira::find($id);

        $cadeiraInfo["cadeira"] = $cadeira;
        $cadeiraInfo["turmas"] = $cadeira->turmas;

        $cadeiraInfo["regente"] = $cadeira->regente->utilizador->nome;

        return view('cadeira')->with($cadeiraInfo);
    } 
}
