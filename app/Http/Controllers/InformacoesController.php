<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilizador;
use App\Aluno;
use App\Docente;
use App\Curso;
use App\Cadeira;
use App\Turma;
use App\AulaTipo;
use App\Sala;

class InformacoesController extends Controller
{
    public function getUtilizadorInfo($idUtilizador) {
        $utilizador = Utilizador::find($idUtilizador);

        if ($utilizador->admistrador) {
            $cargo = 'admistrador';
            $numero = '-';
            $curso = '-';
            $cadeiras = '-';
            $turmas = '-';
        }

        else if ($utilizador->aluno) {
            $cargo = 'aluno';
            $numero = $utilizador->aluno->numero;
            $curso = $utilizador->aluno->curso->nome;

            $cadeiras = ($utilizador->aluno->cadeiras->count() > 0 ? $utilizador->aluno->cadeiras->map(function($cadeira) {
                return $cadeira->nome;
            }) : "-");

            if ($utilizador->aluno->turmas && $utilizador->aluno->turmas->count() > 0) {
                $turmas = $utilizador->aluno->turmas->map(function($turma) {
                    return "$turma->cadeira->nome $turma->numero";
                });
            }

            else {
                $turmas = "-";
            }
        }
        
        else if ($utilizador->docente) {
            $cargo = 'docente';
            $numero = $utilizador->docente->numero;

            $curso = ($utilizador->docente->curso ? $utilizador->docente->curso->nome : "-");

            $cadeiras = ($utilizador->docente->cadeiras->count() > 0 ? $utilizador->docente->cadeiras->map(function($cadeira) {
                return $cadeira->nome;
            }) : "-");

            $turmas = ($utilizador->docente->turmas->count() > 0 ? $utilizador->docente->turmas->map(function($turma) {
                return $turma->cadeira->nome . "-" . $turma->numero;
            }) : "-");
        }

        return response()->json([
            'nome' => $utilizador->nome,
            'email' => $utilizador->email,
            'cargo' => $cargo,
            'numero' => $numero,
            'curso' => $curso,
            'cadeiras' => $cadeiras,
            'turmas' => $turmas
        ]);
    }

    public function getCursoInfo($idCurso) {
        $curso = Curso::find($idCurso);

        $cadeiras = $curso->cadeiras->map( function($cadeira) {
            return $cadeira->nome;
        });

        return response()->json([
            'nome' => $curso->nome,
            'coordenador' => $curso->coordenador->utilizador->nome,
            'cadeiras' => $cadeiras
        ]);
    }

    public function getCadeiraInfo($idCadeira) {
        $cadeira = Cadeira::find($idCadeira);

        $turmas = $cadeira->turmas;

        $curso = ($cadeira->curso) ? $cadeira->curso->nome : "-";
        
        return response()->json([
            'id' => $cadeira->id,
            'nome' => $cadeira->nome,
            'regente' => $cadeira->regente->utilizador->nome,
            'ects' => $cadeira->ECTS,
            'curso' => $curso,
            'semestre' => $cadeira->semestre,
            'ciclo' => $cadeira->ciclo,
            'turmas' => $turmas
        ]);
    }

    public function getTurmaInfo($idTurma) {
        $turma = Turma::find($idTurma);

        return response()->json([
            'numero' => $turma->numero,
            'cadeira' => $turma->cadeira->nome,
            'aulasTipo' => $turma->aulasTipo,
            'docente' => $turma->docente->utilizador->nome,
            'tipo' => $turma->tipo
        ]);
    }

    public function getAulaTipoInfo($idAulaTipo) {
        $aulaTipo = AulaTipo::find($idAulaTipo);

        return response()->json([
            'aulas' => $aulaTipo->aulas
        ]);
    }

    public function getAulasAluno($idAluno) {
        $turmas = [];
        
        $cadeirasTurmas = Aluno::find($idAluno)->cadeiras->map(function ($cadeira) {
            return $cadeira->turmas;
        });

        foreach ($cadeirasTurmas as $cadeiraTurma) {
            foreach ($cadeiraTurma as $turma) {
                
                $turmaInfo = [];
                    
                foreach ($turma->aulasTipo as $aulaTipo) {
                    $aulaTipoInfo = collect($aulaTipo);

                    $nomeCadeira = $aulaTipo->turma->cadeira->nome;

                    $siglaCadeira = $aulaTipo->turma->cadeira->sigla;

                    $pivotAlunoCadeira = $aulaTipo->turma->cadeira->alunos->where('id', $idAluno)->first()->pivot;

                    $turmaPratica = $pivotAlunoCadeira->turma_pratica_id == $aulaTipo->turma_id;

                    $turmaTeorica = $pivotAlunoCadeira->turma_teorica_id == $aulaTipo->turma_id;

                    if ($turmaPratica || $turmaTeorica) {
                        $aulaTipoInfo->put('nomeCadeira', $nomeCadeira);   
                        $aulaTipoInfo->put('siglaCadeira', $siglaCadeira);                   
                        $aulaTipoInfo->put('edificio', $aulaTipo->sala->edificio);
                        $aulaTipoInfo->put('piso', $aulaTipo->sala->piso);
                        $aulaTipoInfo->put('sala', $aulaTipo->sala->num_sala);
                        $aulaTipoInfo->put('tipo', $turmaPratica ? 'TP' : 'T');

                        $turmaInfo[] = $aulaTipoInfo;
                    }
                }
                $turmas[] = $turmaInfo;
            }    
        }

        return response()->json([
            'turmas' => $turmas
        ]);
    }

    public function getAulasDocente($idDocente) {
        $turmas = [];
        $cadeirasTurmas = Docente::find($idDocente)->turmas;

        foreach ($cadeirasTurmas as $turma) {
            $turmaInfo = [];
            
            foreach ($turma->aulasTipo as $aulaTipo) {
                $aulaTipoInfo = collect($aulaTipo);

                $nomeCadeira = $aulaTipo->turma->cadeira->nome;

                $siglaCadeira = $aulaTipo->turma->cadeira->sigla;

                $aulaTipoInfo->put('nomeCadeira', $nomeCadeira);   
                $aulaTipoInfo->put('siglaCadeira', $siglaCadeira);                   
                $aulaTipoInfo->put('edificio', $aulaTipo->sala->edificio);
                $aulaTipoInfo->put('piso', $aulaTipo->sala->piso);
                $aulaTipoInfo->put('sala', $aulaTipo->sala->num_sala);
                $aulaTipoInfo->put('tipo', $aulaTipo->turma->tipo == 0 ? 'TP' : 'T');

                $turmaInfo[] = $aulaTipoInfo;
                
            }
            $turmas[] = $turmaInfo;
        }

        return response()->json([
            'turmas' => $turmas
        ]);
    }

    public function filtarUtilizadores($cargo) {
        if ($cargo == 'todos') {
            $utilizadoresFiltrados = Utilizador::all();
        }

        else if ($cargo == 'alunos') {
            $utilizadoresFiltrados = Utilizador::all()->filter(function ($utilizador) {
                return $utilizador->aluno;
            });
        }

        else if ($cargo == 'admnistradores') {
            $utilizadoresFiltrados = Utilizador::all()->filter(function ($utilizador) {
                return $utilizador->Admistrador;
            });
        }

        else if ($cargo == 'docentes') {
            $utilizadoresFiltrados = Utilizador::all()->filter(function ($utilizador) {
                return $utilizador->docente;
            });
        }

        return response()->json($utilizadoresFiltrados);
    }

    public function filtarCadeiras($curso) {
        if ($curso == "todos") {
            $cadeirasFiltradas = Cadeira::all();
        }

        else {
            $cadeirasFiltradas = Cadeira::all()->filter(function ($cadeira) use ($curso) {
                return $cadeira->curso->nome == $curso;
            });
        }
      
        return response()->json($cadeirasFiltradas);
    }
}
