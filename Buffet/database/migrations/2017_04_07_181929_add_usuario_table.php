<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario');
            $table->string('clave');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni');
            $table->string('email');
            $table->string('telefono');
            $table->foreign('rol_id')->references('id')->on('rol');
            $table->foreign('ubicacion_id')->references('id')->on('ubicacion');
            $table->tinyInteger('habilitado');
            $table->dateTime('updated_at');
            $table->string('remember_token',100);
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
        Schema::drop('usuario');
    }
}
