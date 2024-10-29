<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromediointernetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promediointernets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_biblioteca');
            $table->string('subida');
            $table->string('bajada');
            $table->string('semaforo');
            $table->string('anio');
            $table->string('mes');
            $table->foreign('id_biblioteca')->references('id')->on('bibliotecas')->onDelete('cascade');
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
        Schema::dropIfExists('promediointernets');
    }
}
