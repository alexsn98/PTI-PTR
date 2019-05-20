<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoMudancaTurma extends Model
{
    protected $table = "pedido_mudanca_turma";

    protected $fillable = [
        'utilizador_abrir_id',
        'utilizador_fechar_id',
        'turma_pedida_id'
    ];

    public function aluno() {
        return $this->belongsTo('App\Aluno', 'utilizador_abrir_id', 'utilizador_id');
    }

    public function docente() {
        return $this->belongsTo('App\Docente', 'utilizador_fechar_id', 'utilizador_id');
    }

    public function turmaPedida() {
        return $this->belongsTo('App\Turma');
    }
}
