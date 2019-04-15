<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = "docente";

    public function utilizador() {
        return $this->belongsTo('App\Utilizador');
    }

    public function curso() {
        return $this->hasOne('App\Curso', 'coordenador_id');
    }

    public function cadeiras() {
        return $this->hasMany('App\Cadeira', 'regente_id');
    }

    public function turmas() {
        return $this->hasMany('App\Turma');
    }

    public function pedidosMudancaTurma() {
        return $this->hasMany('App\PedidoMudancaTurma', 'utilizador_fechar_id', 'utilizador_id');
    }
}
