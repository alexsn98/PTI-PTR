<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aula;
use App\Aluno;
use App\AlunoAula;

class AulaController extends Controller
{
    function getAula($idAula) {
        $aula = Aula::find($idAula);

        $turma = $aula->aulaTipo->turma;

        $alunosInscritos = Aluno::all()->filter(function ($aluno) use ($turma) {
            return $aluno->cadeiras->find($turma->cadeira)->pivot->turma_pratica_id == $turma->id;
        });

        $alunosPresentes = [];

        foreach ($alunosInscritos as $aluno) {
            $presente = $aluno->presencas->filter(function ($presenca) use ($idAula) {
                return $presenca->aula->id == $idAula;
            })->count();

            if ($presente > 0) {
                $alunosPresentes[] = $aluno;
            }
        }

        return view('aula', [
            "aula" => $aula,
            "alunosInscritos"=> $alunosInscritos,
            "alunosPresentes" => $alunosPresentes
        ]);
    }

    function submeterPresencas($idAula) {
        $aula = Aula::find($idAula);
        $turma = $aula->aulaTipo->turma;
        $idTurma = $turma->id;

        $alunosInscritos = Aluno::all()->filter(function ($aluno) use ($turma) {
            return $aluno->cadeiras->find($turma->cadeira)->pivot->turma_pratica_id == $turma->id;
        });

        $alunosPresentes = array_keys(request()->all());
        
        foreach ($alunosInscritos as $aluno) {
            if (in_array($aluno->id, $alunosPresentes)) {
                AlunoAula::create([
                    'aluno_id' => $aluno->id,
                    'aula_id' => $idAula,
                    'presente' => true
                ]);
            }
            else {
                AlunoAula::create([
                    'aluno_id' => $aluno->id,
                    'aula_id' => $idAula,
                    'presente' => true
                ]);
            }
        }

        return redirect("/home/cadeira/turma/$idTurma");
    }
}
