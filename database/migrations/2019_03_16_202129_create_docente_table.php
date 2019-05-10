<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('utilizador_id')->unique();
            $table->unsignedInteger('numero')->unique();
            $table->time('inicio_horario_duvidas');
            $table->time('fim_horario_duvidas');
            $table->date('dia_semana_horario_duvidas');
            $table->timestamps();
        });

         // table foreign key constrains
         Schema::table('docente', function (Blueprint $table) {
            $table->foreign('utilizador_id')->references('id')->on('utilizador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente');
    }
}
