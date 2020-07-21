<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequerimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('items');
            $table->string('cantidad');
            $table->string('hrsAcademic');

            $table->integer('materia_id')->unsigned();
            $table->integer('convocatoria_id')->unsigned();

            $table->timestamps();

            //relation
            $table->foreign('materia_id')->references('id')->on('materias')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('convocatoria_id')->references('id')->on('convocatorias')
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
        Schema::dropIfExists('requerimientos');
    }
}
