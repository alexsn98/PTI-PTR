<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadeira extends Model
{
    protected $table = "cadeira";

    protected $fillable = [
        'nome',
        'sigla',
        'ETCS',
        'regente_id',
        'curso_id',
        'semestre',
        'ciclo'
    ];

    public function curso() {
        return $this->belongsTo('\App\Curso');
    }

    public function turmas() {
        return $this->hasMany('\App\Turma');
    }

    public function aulasTipo() {
        return $this->hasManyThrough('App\AulaTipo', 'App\Turma');;
    }

    public function regente() {
        return $this->belongsTo('\App\Docente');
    }

    public function alunos() {
        return $this->belongsToMany('App\Aluno')->withPivot([
            'turma_teorica_id',
            'turma_pratica_id'
        ]);;
    }
}
