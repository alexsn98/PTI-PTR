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

    public static function isAdmin($id) {
        return (Admistrador::where('id_utilizador', $id)->count() > 0);
    }

    public static function isDocente($id) {
        return (Docente::where('id_utilizador', $id)->count() > 0);
    }

    public static function isAluno($id) {
        return (Aluno::where('id_utilizador', $id)->count() > 0);
    }
}
