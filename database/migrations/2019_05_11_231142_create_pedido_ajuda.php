<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoAjuda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_ajuda', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('utilizador_id');
            $table->text('texto_pedido');
            $table->text('resposta');
            $table->timestamps();
        });

        // table foreign key constrains
        Schema::table('pedido_ajuda', function (Blueprint $table) {
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
        Schema::dropIfExists('pedido_ajuda');
    }
}
