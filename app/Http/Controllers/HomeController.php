<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use Auth;

class HomeController extends Controller
{
    public function adminHome() {
        return view('adminHome');
    }

    public function alunoHome() {
        $id = (Auth::id());

        $cadeiras = Aluno::where('id_utilizador', $id)->first()->turmas->first()->cadeira->nome;

        return view('alunoHome')->with(["cadeiras" => $cadeiras]);
    }

    public function docenteHome() {
        return view('docenteHome');
    }
}
