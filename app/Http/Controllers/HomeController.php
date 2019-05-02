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
    public function getUtilizadorInfo($idUtilizador) {
        $utilizadorInfo = [];
        $utilizador = Utilizador::find($idUtilizador);

        $utilizadorNome = $utilizador->nome;
        $utilizadorEmail = $utilizador->email;

        if ($utilizador->admistrador) {
            $cargo = 'admistrador';
            $numero = '-';
            $curso = '-';
            $cadeiras = '-';
        }

        else if ($utilizador->aluno) {
            $cargo = 'aluno';
            $numero = $utilizador->aluno->numero;
            $curso = $utilizador->aluno->curso->nome;
            $cadeiras = $utilizador->aluno->cadeiras->map(function($cadeira) {
                return $cadeira->nome;
            });
        }
        
        else if ($utilizador->docente) {
            $cargo = 'docente';
            $numero = $utilizador->docente->numero;
            $curso = $utilizador->docente->curso->nome;
            $cadeiras = $utilizador->docente->cadeiras->map(function($cadeira) {
                return $cadeira->nome;
            });
        }

        return response()->json([
            'nome' => $utilizadorNome,
            'email' => $utilizadorEmail,
            'cargo' => $cargo,
            'numero' => $numero,
            'curso' => $curso,
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