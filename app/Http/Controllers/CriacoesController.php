<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Cadeira;
use App\Turma;

class CriacoesController extends Controller
{
    public function criarCurso() {
        request()->validate([
            'coordenador_id' => ['required'],
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
            'ETCS' => ['required'],
            'regente_id' => ['required'],
            'curso_id' => ['required'],
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
            'numero' => ['required'],
            'cadeira_id' => ['required'],
            'docente_id' => ['required'],
            'numVagas' => ['required'],
        ]); 

        Turma::create([
            'numero' => request('numeroTurma'),
            'cadeira_id' => $idCadeira,
            'docente_id' => request('regente'),
            'numVagas' => request('vagas')
        ]);

        return redirect("home/cadeira/$idCadeira");
    } 
}
