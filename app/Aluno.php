<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = "aluno";

    public function utilizador() {
        return $this->belongsTo('App\Utilizador');
    }

    public function cadeiras() {
        return $this->belongsToMany('App\Cadeira');
    }
}
