<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoAula extends Model
{
    protected $table= "aluno_aula";

    protected $fillable = [
        'aluno_id',
        'aula_id',
        'presente'
    ];

    public function aluno() {
        return $this->belongsto('App\Aluno');
    }

    public function aula() {
        return $this->belongsto('App\Aula');
    }
}
