<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Utilizador extends Authenticatable 
{
    protected $table = "utilizador";

    protected $fillable = [
        'nome',
        'email',
        'password'
    ];

    public function admistrador() {
        return $this->hasOne('App\Admistrador');
    }

    public function aluno() {
        return $this->hasOne('App\Aluno');
    }

    public function docente() {
        return $this->hasOne('App\Docente');
    }

    public function pedidosReservaSala() {
        return $this->hasMany('App\PedidoReservaSala', 'utilizador_abrir_id');
    }

    public function pedidosAjuda() {
        return $this->hasMany('App\PedidoAjuda');
    }
}
