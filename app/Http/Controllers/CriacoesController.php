<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Cadeira;
use App\Turma;
use App\AulaTipo;
use App\Aula;

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

        return redirect()->back();
    }

    public function criarCadeira() {

        request()->validate([
            'nome' => ['required'],
            'sigla' => ['required'],
            'etcs' => ['required'],
            'regente' => ['required'],
            'curso' => ['required'],
            'semestre' => ['required'],
            'ciclo' => ['required'],
        ]); 

        Cadeira::create([
            'nome' => request('nome'),
            'sigla' => request('sigla'),
            'ETCS' => request('etcs'),
            'regente_id' => request('regente'),
            'curso_id' => request('curso'),
            'semestre' => request('semestre'),
            'ciclo' => request('ciclo')
        ]);

        return redirect()->back();
    } 

    public function criarTurma($idCadeira) {
        request()->validate([
            'numeroTurma' => ['required'],
            'docente' => ['required'],
            'tipo' => ['required'],
            'vagas' => ['required'],
        ]); 

        Turma::create([ 
            'numero' => request('numeroTurma'),
            'cadeira_id' => $idCadeira,
            'docente_id' => request('docente'),
            'numVagas' => request('vagas'),
            'tipo' => request('tipo'),
        ]);

        return redirect()->back();
    }
    
    public function criarAulaTipo($idTurma) {
        request()->validate([
            'edificio' => ['required'],
            'piso' => ['required'],
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

    public function criarAula() {
        request()->validate([
            'aulaTipo' => ['required'],
            'data' => ['required'],
            'sumario' => ['required'],
        ]); 

        Aula::create([
            'aula_tipo_id' => request('aulaTipo'),
            'data' => request('data'),
            'suamario' => request('sumario')
        ]);

        return redirect()->back();
    } 
}
