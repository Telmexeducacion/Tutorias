<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_linea');
            $table->unsignedInteger('id_semaforo');
            $table->string('enviados');
            $table->string('recibidos');
            $table->string('anio');
            $table->string('mes');
            $table->foreign('id_linea')->references('id')->on('lineas')->onDelete('cascade');
            $table->foreign('id_semaforo')->references('id')->on('semaforos')->onDelete('cascade');
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
        Schema::dropIfExists('medicions');
    }
}
