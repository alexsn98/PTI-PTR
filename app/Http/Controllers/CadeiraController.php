<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cadeira;
use App\Aluno;
use Auth;

class CadeiraController extends Controller
{
    public function getCadeira($id) {
        $userId = Auth::id();

        $alunoCadeira = Aluno::where("utilizador_id", $userId)->first()->cadeiras->find($id)->pivot;

        $cadeira = Cadeira::find($id);
        $turmas = $cadeira->turmas;

        $turmaTeorica = $alunoCadeira->turma_teorica_id;
        $turmaPratica = $alunoCadeira->turma_pratica_id;


        return view('cadeira')->with([
            'cadeira' => $cadeira,
            'turmas' => $turmas,
            'turmasAtuais' => [$turmaTeorica, $turmaPratica]]);
    }
}
