<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilizador;
use App\Curso;
use App\Cadeira;
use App\Turma;
use Auth;

class HomeController extends Controller
{
    public function getAdminHome() {
        return view('adminHome');
    }

    public function getAlunoHome() {
        $cadeiras = Utilizador::find((Auth::id()))->aluno->cadeiras->all();
        
        return view('alunoHome')->with(["cadeiras" => $cadeiras]);
    }

    public function getDocenteHome() {
        $docente = Utilizador::find((Auth::id()))->docente;
        
        $curso = $docente->curso;

        $cadeiras = $docente->cadeiras;

        $turmas = $docente->turmas;

        return view('docenteHome')->with([
            'curso' => $curso,
            'cadeiras' => $cadeiras,
            'turmas'=> $turmas
        ]);
    }
}
