<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;
use App\Aluno;
use Auth;

class TurmaController extends Controller
{
    public function getTurma($id) {
        $turma = Turma::find($id);
        $docente = $turma->docente;

        return view('turma')->with([
            'turma' => $turma,
            'docente' => $docente]);
    }

    public function inscrever($id) {
        $turma = Turma::find($id);
        $userId = Auth::id();
        $aluno = Aluno::where("id_utilizador", $userId)->first();
        $idCadeira = $turma->cadeira_id;

        //update do pivot aluno turma
        $alunoTurmas = $aluno->turmas;

        foreach ($alunoTurmas as $alunoTurma) {
            if ($alunoTurma->pivot->turma_id) {
                //por fazer que esti e uma confucao do camandro
            }
            dd($alunoTurma->pivot->turma_id);
        }

        return redirect("home/cadeira/$idCadeira");
    }
}
