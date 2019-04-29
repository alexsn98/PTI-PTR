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
            $table->unsignedInteger('aluno_id');
            $table->unsignedInteger('aula_id');
            $table->boolean('presente');
            $table->timestamps();

            $table->primary('aluno_id', 'aula_id');
        });

         // table foreign key constrains
         Schema::table('aluno_aula', function (Blueprint $table) {
            $table->foreign('aluno_id')->references('id')->on('aluno')->onDelete('cascade');
            $table->foreign('aula_id')->references('id')->on('aula');
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
