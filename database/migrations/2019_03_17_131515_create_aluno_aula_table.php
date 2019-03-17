<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoAulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_aula', function (Blueprint $table) {
            $table->unsignedInteger('aluno');
            $table->unsignedInteger('aula')->unique();
            $table->boolean('presente');
            $table->timestamps();

            $table->primary('aluno', 'aula');
        });

         // table foreign key constrains
         Schema::table('aluno_aula', function (Blueprint $table) {
            $table->foreign('aluno')->references('id')->on('aluno');
            $table->foreign('aula')->references('id')->on('turma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno_aula');
    }
}
