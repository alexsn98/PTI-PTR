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
            'docente' => $docente]);dd($turmasCadeiraArray);
    }

    public function inscrever($id) {
        //devolve aluno autenticado
        $userId = Auth::id();
        $aluno = Aluno::where("id_utilizador", $userId)->first();

        //devolve turma para a qual mudar
        $turma = Turma::find($id);
        $idCadeira = $turma->cadeira_id;

        //devolve todas as turmas da cadeira
        $cadeiraTurmas = Turma::where('cadeira_id', $idCadeira)->get('id');

        //devolve turmas do aluno
        $alunoTurmas = Aluno::where('id_utilizador', $userId)->first()->turmas;

        //devolve turma em que o aluno esta inscrito
        $alunoCadeiraTurmas = $cadeiraTurmas->intersect($alunoTurmas);
        
        //se ja tem turma nesta cadeira
        if ($alunoCadeiraTurmas->count() > 0) {
            $turmaAnterior = $alunoCadeiraTurmas->first()->id;

            //update do pivot aluno turma
            $aluno->turmas()->updateExistingPivot($turmaAnterior, ["turma_id" => $id]);
        }

        else {
            $aluno->turmas()->attach($id);
        }

        return redirect("home/cadeira/$idCadeira");
    }
}
