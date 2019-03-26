<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table = "turma";

    public function alunos() {
        return $this->belongsToMany('\App\Aluno');
    }

    public function docente() {
        return $this->belongsTo('\App\Docente');
    }

    public function cadeira() {
        return $this->belongsTo('\App\Cadeira');
    }
}
