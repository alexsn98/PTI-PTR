<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoMudancaTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pedido_mudanca_turma', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('utilizador_abrir');
            $table->integer('utilizador_fechar');
            $table->integer('turma_pedida');
            $table->timestamps();

            // table foreign key constrains
            $table->foreign('utilizador_abrir')->references('id')->on('aluno');
            $table->foreign('utilizador_fechar')->references('id')->on('docente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pedido_mudanca_turma');
    }
}
