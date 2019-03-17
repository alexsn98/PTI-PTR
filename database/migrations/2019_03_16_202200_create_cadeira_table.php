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
            $table->bigIncrements('id');
            $table->string('nome');
            $table->integer('ETCS');
            $table->integer('regente');
            $table->integer('curso')->nullable();
            $table->integer('semestre')->nullable();
            $table->integer('ciclo');
            $table->timestamps();

            // table foreign key constrains
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
