<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PolizaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('poliza', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('cliente')->references('id')->on('usuario');
            $table->foreign('cobertura')->references('id')->on('cobertura');
            $table->float('precio');
            $table->dateTime('fechaInicio');
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
        Schema::drop('poliza');
    }
}
