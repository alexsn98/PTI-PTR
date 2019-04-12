<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoReservaSalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_reserva_sala', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('utilizador_abrir_id');
            $table->unsignedInteger('utilizador_fechar_id');
            $table->unsignedInteger('sala_id');
            $table->dateTime('inicio');
            $table->dateTime('fim');
            $table->timestamps();
        });

         // table foreign key constrains
         Schema::table('pedido_reserva_sala', function (Blueprint $table) {
            $table->foreign('utilizador_abrir_id')->references('id')->on('utilizador');
            $table->foreign('utilizador_fechar_id')->references('utilizador_id')->on('admistrador');
            $table->foreign('sala_id')->references('id')->on('sala');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_reserva_sala');
    }
}
