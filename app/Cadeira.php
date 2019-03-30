<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadeira extends Model
{
    protected $table = "cadeira";

    public function curso() {
        return $this->belongsTo('\App\Curso');
    }

    public function turmas() {
        return $this->hasMany('\App\Turma');
    }

    public function regente() {
        return $this->belongsTo('\App\Docente');
    }

    public function alunos() {
        return $this->belongsToMany('App\Aluno')->withPivot([
            'turma_teorica_id',
            'turma_pratica_id'
        ]);;
    }
}
