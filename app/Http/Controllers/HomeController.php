<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Docente;
use App\Curso;
use Auth;

class HomeController extends Controller
{
    public function getAdminHome() {
        return view('adminHome');
    }

    public function getAlunoHome() {
        $id = (Auth::id());

        // $turmas = Aluno::where('utilizador_id', $id)->first()->cadeiras;

        $cadeiras = Aluno::where('utilizador_id', $id)->first()->cadeiras->all();
        
        return view('alunoHome')->with(["cadeiras" => $cadeiras]);
    }

    public function getDocenteHome() {
        $id = (Auth::id());

        $curso = Curso::where('coordenador_id', $id)->get();

        return view('docenteHome')->with([
            'cursos' => $curso
        ]);
    }
}
