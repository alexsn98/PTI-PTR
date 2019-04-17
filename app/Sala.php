<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = "sala";

    public function pedidoReservaSala() {
        return $this->hasMany('\App\PedidoReservaSala');
    }
}
