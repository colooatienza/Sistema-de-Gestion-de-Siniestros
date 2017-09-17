<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('auto', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('modelo')->references('id')->on('modelo');
            $table->float('sumaasegurada');
            $table->integer('anio');
            $table->tinyInteger('gnc');
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
        Schema::drop('auto');
    }
}
