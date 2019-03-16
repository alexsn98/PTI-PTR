<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulasTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas_tipo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('turma');
            $table->integer('sala');
            $table->integer('dia_semana');
            $table->time('inicio');
            $table->time('fim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aulas_tipo');
    }
}
