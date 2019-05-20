<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaSala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_sala', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sala_id');
            $table->unsignedInteger('utilizador_id');
            $table->time('inicio');
            $table->time('fim');
            $table->date('data');
            $table->timestamps();
        });

        // table foreign key constrains
        Schema::table('reserva_sala', function (Blueprint $table) {
            $table->foreign('sala_id')->references('id')->on('sala');
            $table->foreign('utilizador_id')->references('id')->on('utilizador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_sala');
    }
}
