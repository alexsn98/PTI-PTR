<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmistradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admistrador', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_utilizador')->unique();
            $table->timestamps();
        });

         // table foreign key constrains
         Schema::table('admistrador', function (Blueprint $table) {
            $table->foreign('id_utilizador')->references('id')->on('utilizador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admistrador');
    }
}
