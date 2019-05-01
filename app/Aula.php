<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = "aula";

    protected $fillable = [
        'aula_tipo_id',
        'data',
        'sumario'
    ];

    public function aulaTipo() {
        return $this->belongsTo('\App\AulaTipo');
    }

    public function presencas() {
        return $this->hasMany('App\AlunoAula');
    }
}
