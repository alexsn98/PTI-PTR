<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilizador;
use App\Curso;
use App\Cadeira;
use App\Turma;
use App\Sala;
use App\PedidoMudancaTurma;
use App\PedidoReservaSala;
use App\ReservaSala;
use Auth;

class HomeController extends Controller
{
    public function getAdminHome() {
        $utilizadores = Utilizador::all();

        $cursos = Curso::all();
        
        $cadeiras = Cadeira::all();

        $pedidosReservaSala = PedidoReservaSala::all();

        $reservasSalas = ReservaSala::all();

        return view('adminHome', [
            'utilizadores' => $utilizadores,
            'cursos' => $cursos,
            'cadeiras' => $cadeiras,
            'pedidosReservaSala' => $pedidosReservaSala,
            'reservasSala' => $reservasSalas
            ]);
    }

    public function getAdminUsers() {
        $utilizadores = Utilizador::all();


        return view('adminUsers', [
            'utilizadores' => $utilizadores
            ]);
    }

    public function getAdminCursos() {
        $utilizadores = Utilizador::all();
        $cursos = Curso::all();

        return view('adminCursos', [
            'utilizadores' => $utilizadores,
            'cursos' => $cursos
            ]);
    }

    public function getAdminCadeiras() {
        $utilizadores = Utilizador::all();
        $cursos = Curso::all();
        $cadeiras = Cadeira::all();

        return view('adminCadeiras', [
            'utilizadores' => $utilizadores,
            'cursos' => $cursos,
            'cadeiras' => $cadeiras,
            ]);
    }

    public function getAdminSalas() {
        $utilizadores = Utilizador::all();

        $pedidosReservaSala = PedidoReservaSala::all();

        $reservasSalas = ReservaSala::all();

        return view('adminSalas', [
            'utilizadores' => $utilizadores,
            'pedidosReservaSala' => $pedidosReservaSala,
            'reservasSala' => $reservasSalas
            ]);
    }



    public function getAlunoHome() {
        $cadeiras = Utilizador::find((Auth::id()))->aluno->cadeiras->all();

        $salas = Sala::all();
        
        return view('alunoHome', [
            'cadeiras' => $cadeiras,
            'salas' => $salas
            ]);
    }

    public function getDocenteHome() {
        $docente = Utilizador::find((Auth::id()))->docente;
        
        $curso = $docente->curso;

        $cadeiras = $docente->cadeiras;

        $turmas = $docente->turmas;

        $pedidosMudancaTurma = $docente->pedidosMudancaTurma;

        $salas = Sala::all();

        return view('docenteHome',[
            'curso' => $curso,
            'cadeiras' => $cadeiras,
            'turmas'=> $turmas,
            'pedidosMudancaTurma' => $pedidosMudancaTurma,
            'salas' => $salas
        ]); 
    }

    public function getVisitanteHome() {
        $cursos = Curso::all();

        $cadeiras = Cadeira::all();

        return view('visitanteHome', [
            'cursos' => $cursos,
            'cadeiras' => $cadeiras
        ]);
    }
}
