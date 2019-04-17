<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservaSala extends Model
{
    protected $table = "reserva_sala";

    protected $fillable = [
        'sala_id',
        'utilizador_id',
        'inicio',
        'fim'
    ];

    public function utilizador() {
        return $this->belongsto('App\Utilizador');
    }

    public function sala() {
        return $this->belongsto('App\Sala');
    }
}
