<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "curso";

    protected $fillable = [
        'coordenador_id',
        'nome'
    ];

    public function cadeiras() {
        return $this->hasMany('\App\Cadeira');
    }

    public function coordenador() {
        return $this->belongsTo('\App\Docente');
    }
}
