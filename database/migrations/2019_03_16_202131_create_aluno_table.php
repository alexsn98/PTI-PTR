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
            $table->bigIncrements('id');
            $table->integer('id_utilizador')->unique();
            $table->integer('id_curso');
            $table->integer('numero')->unique();
            $table->timestamps();

            // table foreign key constrains
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
