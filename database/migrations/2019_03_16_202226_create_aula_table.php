<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('aula_tipo')->unique();
            $table->date('data');
            $table->text('sumario')->nullable();
            $table->timestamps();
            
            // table foreign key constrains
            $table->foreign('aula_tipo')->references('id')->on('cadeira');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aula');
    }
}
