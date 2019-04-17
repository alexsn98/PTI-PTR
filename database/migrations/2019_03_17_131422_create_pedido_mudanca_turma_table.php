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
            $table->unsignedInteger('utilizador_abrir_id');
            $table->unsignedInteger('utilizador_fechar_id');
            $table->unsignedInteger('turma_pedida_id');
            $table->timestamps();
        });

        // table foreign key constrains
        Schema::table('pedido_mudanca_turma', function (Blueprint $table) {
            $table->foreign('utilizador_abrir_id')->references('utilizador_id')->on('aluno');
            $table->foreign('utilizador_fechar_id')->references('utilizador_id')->on('docente');
            $table->foreign('turma_pedida_id')->references('id')->on('turma');
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
