<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('valorado', 128)->nullable();
            $table->string('kardex', 128)->nullable();
            $table->string('estado', 1)->nullable();
            $table->integer('convocatoria_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->timestamps();

            //relation
            $table->foreign('convocatoria_id')->references('id')->on('convocatorias')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('solicituds');
    }
}
