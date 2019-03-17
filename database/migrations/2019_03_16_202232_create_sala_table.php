<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sala', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('edificio');
            $table->unsignedInteger('piso');
            $table->unsignedInteger('num_sala');
            $table->time('abertura')->nullable();
            $table->time('encerramento')->nullable();
            $table->unsignedInteger('num_lugares');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sala');
    }
}
