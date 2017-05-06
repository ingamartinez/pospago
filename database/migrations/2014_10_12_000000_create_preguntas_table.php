<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('go_preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('pregunta');
            $table->integer('tipo_de_respuesta');
            // $table->enum('tipo_de_entrenamiento', ['Entrenamiento Básico', 'Entrenamiento OPTIMO']);
            $table->integer('id_area');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('go_preguntas');
    }
}
