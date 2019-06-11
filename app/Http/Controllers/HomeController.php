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
use App\PedidoAjuda;
use Auth;
class HomeController extends Controller
{
    //Para admin
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
        $utilizadores = Utilizador::all()->sortBy('nome'); 
        $cadeiras = Cadeira::all(); 

        return view('adminUtilizadores', [
            'utilizadores' => $utilizadores,
            'cadeiras' => $cadeiras
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
        $pedidos = PedidoAjuda::all();

        $pedidosAbertos = $pedidos->where('resposta', null)->all();

        $pedidosFechados = $pedidos->where('resposta', '!=',null);
        
        return view('adminAjuda', [
            "pedidosAbertos" => $pedidosAbertos,
            "pedidosFechados" => $pedidosFechados,
        ]);
    }

    //Para aluno
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

        $pedidosFechados = Auth::user()->pedidosAjuda->where('resposta', '!=',null);
        
        return view('alunoAjuda', [
            'docentes' => $docentes,
            'pedidosFechados' => $pedidosFechados
        ]);
    }

    //Para docente
    public function getDocenteHome() {
        $docente = Auth::user()->docente;
        
        $curso = $docente->curso;
        $turmas = $docente->turmas;
        $pedidosMudancaTurma = $docente->pedidosMudancaTurma;
        $salas = Sala::all();
        
        return view('docenteHome',[
            'curso' => $curso,
            'turmas'=> $turmas,
            'pedidosMudancaTurma' => $pedidosMudancaTurma,
            'salas' => $salas
        ]); 
    }

    public function getDocenteTurmas() {
        $docente = Auth::user()->docente;
        
        $cursos = Curso::all();
        $turmas = $docente->turmas;

        return view('docenteTurmas',[
            'cursos' => $cursos,
            'turmas'=> $turmas
        ]); 
    }

    public function getDocenteCadeiras() {
        $docente = Auth::user()->docente;
        $cadeiras = $docente->cadeiras;

        return view('docenteCadeiras',[
            'cadeiras' => $cadeiras
        ]); 
    }

    public function getDocenteCurso() {
        $docente = Auth::user()->docente;
        $curso = $docente->curso;

        return view('docenteCurso',[
            'curso' => $curso
        ]); 
    }

    public function getDocenteAjuda() {
        $docentes = Docente::all();

        $pedidosFechados = Auth::user()->pedidosAjuda->where('resposta', '!=',null);
        
        return view('docenteAjuda', [
            'docentes' => $docentes,
            'pedidosFechados' => $pedidosFechados
        ]);
    }

    public function getDocenteSalas() {
        $salas = Sala::all();
        $reservasSala = Auth::user()->pedidosReservaSala;
        
        return view('docenteSalas', [
            'salas' => $salas,
            'reservasSala' => $reservasSala
        ]);
    }

    //Para visitante
    public function getVisitanteHome() {
        $cursos = Curso::all();
        $cadeiras = Cadeira::all();
        return view('visitanteHome', [
            'cursos' => $cursos,
            'cadeiras' => $cadeiras
        ]);
    }
}