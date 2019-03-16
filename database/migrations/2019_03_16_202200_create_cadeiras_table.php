<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadeirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadeiras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->integer('ETCS');
            $table->integer('regente');
            $table->integer('curso');
            $table->integer('semestre');
            $table->integer('ciclo');
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
        Schema::dropIfExists('cadeiras');
    }
}
