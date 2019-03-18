<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadeiraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadeira', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->unsignedInteger('ETCS');
            $table->unsignedInteger('regente');
            $table->unsignedInteger('curso')->nullable();
            $table->unsignedInteger('semestre')->nullable();
            $table->unsignedInteger('ciclo');
            $table->timestamps();
        });

         // table foreign key constrains
         Schema::table('cadeira', function (Blueprint $table) {
            $table->foreign('regente')->references('id')->on('docente');
            $table->foreign('curso')->references('id')->on('curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cadeira');
    }
}
