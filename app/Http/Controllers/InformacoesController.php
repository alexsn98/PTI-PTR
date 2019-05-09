<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilizador;
use App\Aluno;
use App\Curso;
use App\Cadeira;
use App\Turma;
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
            'nome' => $utilizador->nome,
            'email' => $utilizador->email,
            'cargo' => $cargo,
            'numero' => $numero,
            'curso' => $curso,
            'cadeiras' => $cadeiras
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

        return response()->json([
            'id' => $cadeira->id,
            'nome' => $cadeira->nome,
            'regente' => $cadeira->regente->utilizador->nome,
            'etcs' => $cadeira->ETCS,
            'curso' => $cadeira->curso->nome,
            'semestre' => $cadeira->semestre,
            'ciclo' => $cadeira->ciclo
        ]);
    }

    public function getAulasAluno($idAluno) {
        $turmas = [];
        
        $cadeirasTurmas = Aluno::find($idAluno)->cadeiras->map(function ($cadeira) {
            return $cadeira->turmas;
        });
        
        foreach ($cadeirasTurmas as $cadeiraTurma) {
            foreach ($cadeiraTurma as $turma) {
                $nomeCadeira = $turma->cadeira->nome;

                $turmas[$nomeCadeira] = $turma->aulasTipo;
            }
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
