<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioDuvidas extends Model
{
    protected $table = "horario_duvidas";

    protected $fillable = [
        'aluno_id',
        'docente_id',
        'dia',
        'inicio',
        'fim'
    ];

    public function aluno() {
        return $this->belongsTo('App\Utilizador');
    }

    public function docente() {
        return $this->belongsTo('App\Utilizador');
    }
}
