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
            $table->unsignedInteger('aluno');
            $table->unsignedInteger('turma');
            $table->timestamps();

            $table->primary('aluno', 'turma');            
        });

         // table foreign key constrains
         Schema::table('aluno_turma', function (Blueprint $table) {
            $table->foreign('aluno')->references('id')->on('aluno')->onDelete('cascade');
            $table->foreign('turma')->references('id')->on('turma')->onDelete('cascade');
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
