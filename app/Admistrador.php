<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admistrador extends Model
{
    protected $table = "admistrador";

    public function utilizador() {
        return $this->belongsTo('App\Utilizador');
    }
}
