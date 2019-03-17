<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulaTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_tipo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('turma');
            $table->unsignedInteger('sala');
            $table->unsignedInteger('dia_semana');
            $table->time('inicio');
            $table->time('fim');
            $table->timestamps(); 
        });

         // table foreign key constrains
         Schema::table('aula_tipo', function (Blueprint $table) {
            $table->foreign('turma')->references('id')->on('turma')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aula_tipo');
    }
}
