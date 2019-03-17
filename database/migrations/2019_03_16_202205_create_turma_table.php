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
            $table->unsignedInteger('cadeira');
            $table->unsignedInteger('docente');
            $table->string('estado');
            $table->timestamps();
        });

         // table foreign key constrains
         Schema::table('turma', function (Blueprint $table) {
            $table->foreign('cadeira')->references('id')->on('cadeira')->onDelete('cascade');
            $table->foreign('docente')->references('id')->on('docente');
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
