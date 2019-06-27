<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoCadeiraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_cadeira', function (Blueprint $table) {
            $table->unsignedInteger('aluno_id');
            $table->unsignedInteger('cadeira_id');
            $table->unsignedInteger('turma_pratica_id')->nullable();
            $table->unsignedInteger('turma_teorica_id')->nullable();
            $table->timestamps();

            $table->primary(['aluno_id', 'cadeira_id']); 
        });

        Schema::table('aluno_cadeira', function (Blueprint $table) {
            $table->foreign('aluno_id')->references('id')->on('aluno')->onDelete('cascade');
            $table->foreign('cadeira_id')->references('id')->on('cadeira')->onDelete('cascade');
            $table->foreign('turma_pratica_id')->references('id')->on('turma')->onDelete('set null'); 
            $table->foreign('turma_teorica_id')->references('id')->on('turma')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno_cadeira');
    }
}
