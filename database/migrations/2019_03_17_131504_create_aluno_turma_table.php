<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTurmaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_turma', function (Blueprint $table) {
            $table->unsignedInteger('aluno_id');
            $table->unsignedInteger('turma_id');
            $table->timestamps();

            $table->primary('aluno_id', 'turma_id');            
        });

         // table foreign key constrains
         Schema::table('aluno_turma', function (Blueprint $table) {
            $table->foreign('aluno_id')->references('id')->on('aluno')->onDelete('cascade');
            $table->foreign('turma_id')->references('id')->on('turma')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno_turma');
    }
}
