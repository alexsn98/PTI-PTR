<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoAjuda extends Model
{
    protected $table = "pedido_ajuda";

    protected $fillable = [
        'utilizador_id',
        'texto_pedido',
        'resposta',
        'estado'
    ];

    public function utilizadorAbre() {
        return $this->belongsTo('App\Utilizador', 'utilizador_id');
    }
}
