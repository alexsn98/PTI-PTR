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
            $table->bigIncrements('id');
            $table->integer('utilizador_abrir');
            $table->integer('utilizador_fechar');
            $table->integer('sala');
            $table->dateTime('inicio');
            $table->dateTime('fim');
            $table->timestamps();

            // table foreign key constrains
            $table->foreign('utilizador_abrir')->references('id')->on('utilizador');
            $table->foreign('utilizador_fechar')->references('id')->on('admistrador');
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
