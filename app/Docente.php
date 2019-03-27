<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = "docente";

    public function utilizador() {
        return $this->belongsTo('App\Utilizador');
    }

    public function turmas() {
        return $this->hasMany('App\Turma');
    }
}
