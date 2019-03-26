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
            $table->unsignedInteger('id_utilizador')->unique();
            $table->unsignedInteger('numero')->unique();
            $table->string('nome');
            $table->timestamps();
        });

         // table foreign key constrains
         Schema::table('docente', function (Blueprint $table) {
            $table->foreign('id_utilizador')->references('id')->on('utilizador')->onDelete('cascade');
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
