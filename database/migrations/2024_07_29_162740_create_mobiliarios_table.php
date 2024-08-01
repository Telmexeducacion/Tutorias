<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobiliariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobiliarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_biblioteca');
            $table->string('tipo');
            $table->integer('cantidad');
            $table->integer('funcional');
            $table->integer('dañado');
            $table->integer('faltante');
            $table->longText('observaciones');
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
        Schema::dropIfExists('mobiliarios');
    }
}
