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
            $table->increments('id');
            $table->unsignedInteger('aula_tipo_id');
            $table->date('data');
            $table->text('sumario')->nullable();
            $table->timestamps();
        });

         // table foreign key constrains
         Schema::table('aula', function (Blueprint $table) {
            $table->foreign('aula_tipo_id')->references('id')->on('aula_tipo');
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
