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
            $table->bigIncrements('id');
            $table->integer('turma')->unique();
            $table->integer('sala');
            $table->integer('dia_semana');
            $table->time('inicio');
            $table->time('fim');
            $table->timestamps();
        
            // table foreign key constrains
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
