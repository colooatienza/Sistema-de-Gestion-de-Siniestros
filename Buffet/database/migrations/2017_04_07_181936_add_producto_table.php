<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('marca');
            $table->int('stock');
            $table->int('stock_minimo');
            $table->foreign('categoria_id')->references('id')->on('categoria');
            $table->string('proveedor');
            $table->float('precio', 8, 2);
            $table->string('descripcion');
            $table->dateTime('fecha_alta');
            $table->tinyInteger('descuentaStock');
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
        Schema::drop('producto');
    }
}
