<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadeira extends Model
{
    protected $table = "cadeira";

    public function curso() {
        return $this->hasOne('\App\Curso');
    }

    public function turmas() {
        return $this->hasMany('\App\Turma');
    }

    public function regente() {
        return $this->hasOne('\App\Docente');
    }
}
