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
        return $this->hasOne('\App\Docente');
    }

    public function alunos() {
        return $this->belongsToMany('App\Aluno');
    }
}
