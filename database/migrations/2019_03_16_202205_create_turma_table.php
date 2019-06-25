<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('numero');
            $table->unsignedInteger('cadeira_id');
            $table->unsignedInteger('docente_id');
            $table->unsignedInteger('num_vagas');
            $table->unsignedInteger('num_alunos_inscritos')->default('0');
            $table->unsignedInteger('tipo');
            $table->timestamps();
        });

         // table foreign key constrains
         Schema::table('turma', function (Blueprint $table) {
            $table->foreign('cadeira_id')->references('id')->on('cadeira')->onDelete('cascade');
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
        Schema::dropIfExists('turma');
    }
}
