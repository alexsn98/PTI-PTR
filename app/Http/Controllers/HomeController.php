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

        $numero = Aluno::where('id_utilizador', $id)->first()->numero;
        $turmas = Aluno::where('id_utilizador', $id)->first()->turmas->all();

        return view('alunoHome')->with([
            "turmas" => $turmas,
            "numero" => $numero]);
    }

    public function getDocenteHome() {
        $id = (Auth::id());

        $numero = Docente::where('id_utilizador', $id)->first()->numero;

        return view('docenteHome')->with(["numero" => $numero]);
    }
}
