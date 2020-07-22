<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file', 128)->nullable();
            $table->string('estado')->default('En revision');
            $table->string('motivo')->default('Aun no se ha decidido');

            $table->integer('documento_id')->unsigned();
            $table->integer('postulation_id')->unsigned();

            $table->timestamps();

            //relation
            $table->foreign('documento_id')->references('id')->on('documentos')
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
        Schema::dropIfExists('archivos');
    }
}
