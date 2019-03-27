<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Docente;
use Auth;

class HomeController extends Controller
{
    public function getAdminHome() {
        return view('adminHome');
    }

    public function getAlunoHome() {
        $id = (Auth::id());

        $turmas = Aluno::where('id_utilizador', $id)->first()->turmas->all();

        return view('alunoHome')->with(["turmas" => $turmas]);
    }

    public function getDocenteHome() {
        $id = (Auth::id());

        return view('docenteHome');
    }
}
