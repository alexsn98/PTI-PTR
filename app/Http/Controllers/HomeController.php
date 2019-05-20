<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Utilizador;
use App\Docente;
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
        return view('adminHome', [
            'utilizadoresNum' => Utilizador::count(),
            'cursosNum' => Curso::count(),
            'cadeirasNum' => Cadeira::count(),
            'pedidosReservaSalaNum' =>  PedidoReservaSala::count(),
            'reservasSalasNum' => ReservaSala::count()
        ]);
    }

    public function getAdminUtilizadores() {
        $utilizadores = Utilizador::all(); 

        return view('adminUtilizadores', [
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

    public function getAdminAjuda() {
        $utilizadores = Utilizador::all();
        
        return view('adminAjuda');
    }

    public function getAlunoHome() {
        $cadeiras = Auth::user()->aluno->cadeiras->all();
        
        return view('alunoHome', [
            'cadeiras' => $cadeiras
        ]);
    }

    public function getAlunoCadeiras() {
        $cadeiras = Auth::user()->aluno->cadeiras->all();
        
        return view('alunoCadeiras', [
            'cadeiras' => $cadeiras
        ]);
    }

    public function getAlunoSalas() {
        $salas = Sala::all();
        $reservasSala = Auth::user()->pedidosReservaSala;
        
        return view('alunoSala', [
            'salas' => $salas,
            'reservasSala' => $reservasSala
        ]);
    }

    public function getAlunoHorarioDuvidas() {
        $docentes = Docente::all();
        
        return view('alunoHorarioDuvidas', [
            'docentes' => $docentes
        ]);
    }

    public function getAlunoAjuda() {
        $docentes = Docente::all();
        
        return view('alunoAjuda', [
            'docentes' => $docentes
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