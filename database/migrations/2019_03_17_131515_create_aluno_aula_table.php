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
            $table->integer('aluno');
            $table->integer('aula')->unique();
            $table->boolean('presente');
            $table->timestamps();

            $table->primary('aluno', 'aula');
            
            // table foreign key constrains
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
