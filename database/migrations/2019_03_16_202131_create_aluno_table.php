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
            $table->string('faculdade');
            $table->timestamps();
        });

        // table foreign key constrains
        Schema::table('aluno', function (Blueprint $table) {
            $table->foreign('utilizador_id')->references('id')->on('utilizador')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('curso');
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
