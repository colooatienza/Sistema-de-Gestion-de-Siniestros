<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ViviendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('vivienda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('metros');
            $table->foreign('ciudad')->references('id')->on('ciudad');
            $table->foreign('tipo')->references('id')->on('tipovivienda');
            $table->integer('sumaasegurada');
            $table->tinyInteger('alarma');
            $table->foreign('poliza')->references('id')->on('poliza');
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
        Schema::drop('vivienda');
    }
}
