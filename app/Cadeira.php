<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadeira extends Model
{
    protected $table = "cadeira";

    public function curso() {
        $this->hasOne('\App\Curso');
    }

    public function turmas() {
        $this->hasMany('\App\Turma');
    }

    public function regente() {
        return $this->hasOne('\App\Docente');
    }
}
