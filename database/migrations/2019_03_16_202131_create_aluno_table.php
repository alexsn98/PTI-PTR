<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('utilizador_id')->unique();
            $table->unsignedInteger('curso_id');
            $table->unsignedInteger('numero')->unique();
            $table->timestamps();
        });

        // table foreign key constrains
        Schema::table('aluno', function (Blueprint $table) {
            $table->foreign('id_utilizador')->references('id')->on('utilizador')->onDelete('cascade');
            $table->foreign('id_curso')->references('id')->on('curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() 
    {
        Schema::dropIfExists('aluno');
    }
}
