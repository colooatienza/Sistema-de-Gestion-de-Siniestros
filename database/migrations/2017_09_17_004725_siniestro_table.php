<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiniestroTable extends Migration
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
            $table->string('estado');
            $table->dateTime('fecha');
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
