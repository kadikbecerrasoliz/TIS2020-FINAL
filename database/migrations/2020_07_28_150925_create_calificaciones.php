<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('puntaje_final');

            $table->integer('postulation_requerimiento_id')->unsigned()->nullable();
            $table->integer('postulation_id')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('postulation_requerimiento_id')->references('id')->on('postulation_requerimientos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('postulation_id')->references('id')->on('postulations')
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
        Schema::dropIfExists('calificacions');
    }
}
