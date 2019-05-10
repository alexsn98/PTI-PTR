<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AulaTipo extends Model
{
    protected $table = "aula_tipo";

    protected $fillable = [
        'turma_id',
        'sala_id',
        'dia_semana',
        'inicio',
        'fim'
    ];

    public function turma() {
        return $this->belongsTo('\App\Turma');
    }

    public function aulas() {
        return $this->hasmany('\App\Aula');
    }

    public function sala() {
        return $this->belongsTo('\App\Sala');
    }
}
