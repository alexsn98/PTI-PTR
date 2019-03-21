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
}
