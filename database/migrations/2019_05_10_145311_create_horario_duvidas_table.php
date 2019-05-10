<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioDuvidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_duvidas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('aluno_id');
            $table->unsignedInteger('docente_id');
            $table->date('dia');
            $table->time('inicio');
            $table->time('fim');
            $table->timestamps();
        });

        // table foreign key constrains
        Schema::table('horario_duvidas', function (Blueprint $table) {
            $table->foreign('aluno_id')->references('id')->on('aluno');
            $table->foreign('docente_id')->references('id')->on('docente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horario_duvidas');
    }
}
