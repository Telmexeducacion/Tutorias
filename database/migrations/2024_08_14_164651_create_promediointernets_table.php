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
            $table->unsignedInteger('id_semaforo');
            $table->string('enviado');
            $table->string('recibidos');
            $table->string('anio');
            $table->foreign('id_semaforo')->references('id')->on('semaforos')->onDelete('cascade');
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
