<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Cadeira;
use App\Turma;

class CriacoesController extends Controller
{
    public function criarCurso() {
        Curso::create([
            'coordenador_id' => request('coordenador'),
            'nome' => request('nome')
        ]);

        return redirect("home/admin");
    }

    public function criarCadeira() {
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
        Turma::create([
            'numero' => request('numeroTurma'),
            'cadeira_id' => $idCadeira,
            'docente_id' => request('regente'),
            'numVagas' => request('vagas')
        ]);

        return redirect("home/cadeira/$idCadeira");
    } 
}
