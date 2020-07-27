<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimientoTematicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimiento_tematicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('puntos')->default('0');

            $table->timestamps();

            $table->integer('requerimiento_id')->unsigned()->nullable();
            $table->integer('tematica_id')->unsigned()->nullable();

            $table->foreign('requerimiento_id')->references('id')->on('requerimientos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('tematica_id')->references('id')->on('tematicas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requerimiento_tematicas');
    }
}
