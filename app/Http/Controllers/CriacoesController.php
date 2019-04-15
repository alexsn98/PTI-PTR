<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Cadeira;
use App\Turma;
use App\AulaTipo;

class CriacoesController extends Controller
{
    public function criarCurso() {
        request()->validate([
            'coordenador' => ['required'],
            'nome' => ['required']
        ]); 
        
        Curso::create([
            'coordenador_id' => request('coordenador'),
            'nome' => request('nome')
        ]);

        return redirect("home/admin");
    }

    public function criarCadeira() {
        request()->validate([
            'nome' => ['required'],
            'etcs' => ['required'],
            'regente' => ['required'],
            'curso' => ['required'],
            'semestre' => ['required'],
            'ciclo' => ['required'],
        ]); 

        Cadeira::create([
            'nome' => request('nome'),
            'ETCS' => request('etcs'),
            'regente_id' => request('regente'),
            'curso_id' => request('curso'),
            'semestre' => request('semestre'),
            'ciclo' => request('ciclo')
        ]);

        return redirect("home/admin");
    } 

    public function criarTurma($idCadeira) {
        request()->validate([
            'numeroTurma' => ['required'],
            'regente' => ['required'],
            'vagas' => ['required'],
        ]); 

        Turma::create([ 
            'numero' => request('numeroTurma'),
            'cadeira_id' => $idCadeira,
            'docente_id' => request('regente'),
            'numVagas' => request('vagas')
        ]);

        return redirect("home/cadeira/$idCadeira");
    }
    
    public function criarAulaTipo($idTurma) {
        request()->validate([
            'sala' => ['required'],
            'diaSemana' => ['required'],
            'inicio' => ['required'],
            'fim' => ['required'],
        ]); 

        AulaTipo::create([
            'turma_id' => $idTurma,
            'sala_id' => request('sala'),
            'dia_semana' => request('diaSemana'),
            'inicio' => request('inicio'),
            'fim' => request('fim')
        ]);

        return redirect()->back();
    } 
}
