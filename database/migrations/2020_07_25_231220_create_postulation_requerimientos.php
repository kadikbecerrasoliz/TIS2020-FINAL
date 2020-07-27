<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulationRequerimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulation_requerimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estado')->default('En revision');

            $table->integer('requerimiento_id')->unsigned()->nullable();
            $table->integer('postulation_id')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('postulation_id')->references('id')->on('postulations')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('requerimiento_id')->references('id')->on('requerimientos')
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
        Schema::dropIfExists('postulation_requerimientos');
    }
}
