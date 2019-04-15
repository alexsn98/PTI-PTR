<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table = "turma";

    protected $fillable = [
        'numero',
        'cadeira_id',
        'docente_id',
        'numVagas'
    ];

    public function docente() {
        return $this->belongsTo('\App\Docente');
    }

    public function cadeira() {
        return $this->belongsTo('\App\Cadeira');
    }

    public function aulasTipo() {
        return $this->hasMany('\App\AulaTipo');
    }

    public function pedidoMudancaTurma() {
        return $this->hasMany('\App\PedidoMudancaTurma');
    }
}
