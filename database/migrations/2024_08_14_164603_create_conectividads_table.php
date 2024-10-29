<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConectividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conectividads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_biblioteca');
            $table->string('nombreFacturacion');
            $table->string('pagoConvenio');
            $table->string('pagoReal');
            $table->string('vigenciaServicio');
            $table->string('cuentaMaestra');
            $table->string('paquete');
            $table->string('costo');
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
        Schema::dropIfExists('conectividads');
    }
}
