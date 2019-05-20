<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoReservaSala extends Model
{
    protected $table = "pedido_reserva_sala";

    protected $fillable = [
        'utilizador_abrir_id',
        'sala_id',
        'inicio',
        'fim',
        'descricao'
    ];

    public function utilizadorAbre() {
        return $this->belongsTo('App\Utilizador', 'utilizador_abrir_id');
    }

    public function sala() {
        return $this->belongsTo('App\Sala');
    }
}
