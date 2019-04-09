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

    public function cadeira() {
        return $this->belongsTo('\App\Cadeira');
    }

    public function sala() {
        return $this->hasOne('\App\Sala');
    }
}
