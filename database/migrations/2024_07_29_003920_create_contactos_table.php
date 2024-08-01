<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_biblioteca');
            $table->unsignedInteger('id_tutor');
            $table->string('estado');
            $table->string('comentarios');
            $table->foreign('id_biblioteca')->references('id')->on('bibliotecas')->onDelete('cascade');
            $table->foreign('id_tutor')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('contactos');
    }
}
