<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;
use App\Utilizador;
use App\Cadeira;
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
        //devolve aluno autenticado
        $aluno = Utilizador::find((Auth::id()))->aluno;

        //devolve turma para a qual mudar
        $cadeira = Turma::find($id)->cadeira_id; 

        //update do pivot aluno cadeira
        $aluno->cadeiras()->updateExistingPivot($cadeira, ["turma_pratica_id" => $id]);

        return redirect("home/cadeira/$cadeira");
    }
}
