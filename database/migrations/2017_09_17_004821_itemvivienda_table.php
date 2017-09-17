<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemviviendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('itemvivienda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objeto');
            $table->string('marca');
            $table->string('modelo');
            $table->string('nroserie');
            $table->float('sumaasegurada');
            $table->foreign('vivienda')->references('id')->on('vivienda');
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
        Schema::drop('itemvivienda');
    }
}
