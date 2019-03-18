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
    public function up() 
    {
        Schema::create('pedido_mudanca_turma', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('utilizador_abrir');
            $table->unsignedInteger('utilizador_fechar');
            $table->unsignedInteger('turma_pedida');
            $table->timestamps();
        });

         // table foreign key constrains
         Schema::table('pedido_mudanca_turma', function (Blueprint $table) {
            $table->foreign('utilizador_abrir')->references('id')->on('aluno');
            $table->foreign('utilizador_fechar')->references('id')->on('docente');
            $table->foreign('turma_pedida')->references('id')->on('turma');
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
