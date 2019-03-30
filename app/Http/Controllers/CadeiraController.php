<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cadeira;
use App\Aluno;
use Auth;

class CadeiraController extends Controller
{
    public function getCadeira($id) {
        $userId = Auth::id();

        $cadeira = Cadeira::find($id);
        $turmas = $cadeira->turmas;
        
        $turmasAtuais = Aluno::where('utilizador_id', $userId)->first()->turmas;

        $idTurmasAtuais = [];

        foreach ($turmasAtuais as $turmaAtual) {
            $idTurmasAtuais[] = $turmaAtual->id;
        }

        return view('cadeira')->with([
            'cadeira' => $cadeira,
            'turmas' => $turmas,
            'turmasAtual' => $idTurmasAtuais]);
    }
}
