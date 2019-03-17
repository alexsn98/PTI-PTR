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
            $table->unsignedInteger('utilizador_abrir');
            $table->unsignedInteger('utilizador_fechar');
            $table->unsignedInteger('sala');
            $table->dateTime('inicio');
            $table->dateTime('fim');
            $table->timestamps();
        });

         // table foreign key constrains
         Schema::table('pedido_reserva_sala', function (Blueprint $table) {
            $table->foreign('utilizador_abrir')->references('id')->on('utilizador');
            $table->foreign('utilizador_fechar')->references('id')->on('admistrador');
            $table->foreign('sala')->references('id')->on('sala');
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
