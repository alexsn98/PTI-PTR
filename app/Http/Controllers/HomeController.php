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
        $cursos = Curso::all()->sortBy('nome');
        return view('adminCursos', [
            'utilizadores' => $utilizadores,
            'cursos' => $cursos
            ]);
    }
    
    public function getAdminCadeiras() {
        $utilizadores = Utilizador::all();
        $cursos = Curso::all();
        $cadeiras = Cadeira::all()->sortBy('nome');
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
        if (date('m') > 1 && date('m') < 9) {
            $cadeiras = Auth::user()->aluno->cadeiras->filter(function ($cadeira) {
                return $cadeira->semestre == 2;
            });
        }

        else {
            $cadeiras = Auth::user()->aluno->cadeiras->filter(function ($cadeira) {
                return $cadeira->semestre == 1;
            });
        }
        
        return view('alunoHome', [
            'cadeiras' => $cadeiras
        ]);
    }

    public function getAlunoCadeiras() {
        $cadeiras = collect(Auth::user()->aluno->cadeiras->all())->sortBy('nome');
        
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
        $alunoTurmas = Auth::user()->aluno->cadeiras->flatMap(function ($cadeira) {
            return $cadeira->turmas;
        });;

        $docentes = $alunoTurmas->map(function ($turma) {
            return $turma->docente;
        })->unique();
        

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
        
        $cadeiras = $docente->cadeiras;

        $aulasTipoCadeiras = $cadeiras->flatMap(function ($cadeira) {
            return $cadeira->turmas; 
            })->flatMap(function ($turma) {
                return $turma->aulasTipo;
            }); 

        $alunosSemTurma = [];
        foreach ($cadeiras as $cadeira) {
            $alunos = $cadeira->alunos;
            
            foreach ($alunos as $aluno) {
                $alunoTurmaTeorica = $aluno->pivot->turma_teorica_id;
                $alunoTurmaPratica = $aluno->pivot->turma_pratica_id;
                
                if ($alunoTurmaTeorica == null || $alunoTurmaPratica == null) {
                    $alunosSemTurma[] = [
                        'aluno' => $aluno, 
                        'cadeira' => $cadeira->nome
                    ];
                }
            }
        }

        $alunosComSobreposicao = [];

        foreach ($alunosSemTurma as $alunoSemTurma) {
            $aluno = $alunoSemTurma['aluno'];

            $turmasTeoricas = $aluno->cadeiras->map(function ($cadeira) {
               return Turma::find($cadeira->pivot->turma_teorica_id); 
                })->filter(function ($turma) {
                    return $turma != null;
                }); 

            $turmasPraticas = $aluno->cadeiras->map(function ($cadeira) {
                return Turma::find($cadeira->pivot->turma_pratica_id); 
                })->filter(function ($turma) {
                    return $turma != null;
                }); 

            $aulasTipoTeoricas = $turmasTeoricas->flatMap(function ($turma) {
                return $turma->aulasTipo;
            });

            foreach ($aulasTipoTeoricas as $aulaTipoTeorica) {
                $inicioAula = strtotime($aulaTipoTeorica->inicio);
                $fimAula = strtotime($aulaTipoTeorica->fim);
                $diaAula = $aulaTipoTeorica->dia_semana;
                $aulaSobreposta = False;

                foreach ($aulasTipoCadeiras as $aulaTipoCadeiras) {
                    $inicioAulaCadeira = strtotime($aulaTipoTeorica->inicio);
                    $fimAulaCadeira = strtotime($aulaTipoTeorica->fim);
                    $diaAulaCadeira = $aulaTipoTeorica->dia_semana;

                    if ($diaAula == $diaAulaCadeira && $inicioAula >= $inicioAulaCadeira && $inicioAula <= $fimAulaCadeira) {
                        $aulaSobreposta = True;
                    }

                    if ($diaAula == $diaAulaCadeira && $fimAula >= $inicioAulaCadeira && $fimAula <= $fimAulaCadeira) {
                        $aulaSobreposta = True;
                    }
                }
            }

            if ($aulaSobreposta) {
                $alunosComSobreposicao[] = [
                    'aluno' => $aluno, 
                    'cadeira' => $cadeira->nome,
                    'incompatibilidade' => True
                ];
            }

            else {
                $alunosComSobreposicao[] = [
                    'aluno' => $aluno, 
                    'cadeira' => $cadeira->nome,
                    'incompatibilidade' => False
                ];
            }
        }

        return view('docenteHome',[
            'curso' => $curso,
            'turmas'=> $turmas,
            'pedidosMudancaTurma' => $pedidosMudancaTurma,
            'salas' => $salas,
            'alunosSemTurma' => $alunosComSobreposicao
        ]); 
    }

    public function getDocenteTurmas() {
        $docente = Auth::user()->docente;
        
        $cursos = Curso::all();
        $turmas = $docente->turmas;

        $cadeiras = $turmas->map(function ($turma) {
            return $turma->cadeira;
        })->unique();

        return view('docenteTurmas',[
            'cursos' => $cursos,
            'turmas' => $turmas,
            'cadeiras' => $cadeiras
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
        $cadeiras = Cadeira::all()->sortBy('nome');

        return view('visitanteHome', [
            'cadeiras' => $cadeiras
        ]);
    }
}