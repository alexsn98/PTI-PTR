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
        
        $turmasCadeira = Turma::where('cadeira_id', $idCadeira)->get();
        
        $turmasCadeiraArray = [];

        foreach ($turmasCadeira as $turmaCadeira) {
            $turmasCadeiraArray[] = $turmaCadeira->id;      
        }

        $turmasAtuais = Aluno::where('id_utilizador', $userId)->first()->turmas;

        foreach ($turmasAtuais as $turmaAtual) {
            if (in_array($turmaAtual->id, $turmasCadeiraArray)) {
                $cadeiraAnterior = $turmaAtual->id;
            } 
        }
        //update do pivot aluno turma  FALTA CONSEGUIR IR BUSCAR O ID DA TURMA ANTERIOR

        $aluno->turmas()->updateExistingPivot($cadeiraAnterior, ["turma_id" => $id]);

        // $alunoTurmas = $aluno->turmas;
        // foreach ($alunoTurmas as $alunoTurma) {
        //     if ($alunoTurma->pivot->turma_id) {
        //         //por fazer que isto e uma confucao do camandro
        //         $aluno->turmas()->updateExistingPivot($aluno->id, ["turma_id" => $id]);
        //     }
        //     dd($alunoTurma->pivot->turma_id);
        // }

        return redirect("home/cadeira/$idCadeira");
    }
}
