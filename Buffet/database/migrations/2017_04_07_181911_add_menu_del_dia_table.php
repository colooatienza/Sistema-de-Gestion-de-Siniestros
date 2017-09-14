<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMenuDelDiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_del_dia', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('producto_id')->references('id')->on('producto');
            $table->date('fecha');
            $table->tinyInteger('borrado');
            $table->int('cant');
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
        Schema::drop('menu_del_dia');
    }
}
