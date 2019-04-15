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
        return $this->belongsToMany('App\Cadeira')->withPivot([
            'turma_teorica_id',
            'turma_pratica_id'
        ]);
    }

    public function pedidosMudancaTurma() {
        return $this->hasMany('App\PedidoMudancaTurma', 'utilizador_abrir_id', 'utilizador_id');
    }
}
