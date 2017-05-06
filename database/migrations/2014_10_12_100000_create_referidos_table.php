<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferidosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('go_referidos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('departamento',60)->nullable();
            $table->string('ciudad', 60)->nullable();
            $table->string('nombres', 60)->nullable();
            $table->string('apellidos')->nullable();
            $table->string('empresa')->nullable();
            $table->string('correo', 60)->nullable();

            $table->string('fecha_de_nacimiento', 60)->nullable();
            $table->string('direccion', 60)->nullable();
            $table->string('barrio', 60)->nullable();
            $table->string('numero_movil', 60)->nullable();

            $table->string('numero_movil_2')->nullable();
            $table->string('producto_de_interes')->nullable();
            $table->string('tipo_de_prospecto')->nullable();
            $table->string('id_pdv')->nullable();
            $table->string('estado')->nullable();
            $table->string('cedula_cliente')->nullable();
            $table->string('movil_plan_cliente')->nullable();
            $table->string('fecha_de_compra')->nullable();
            $table->string('fecha_de_posible_compra')->nullable();
            $table->string('presupuesto_identificado')->nullable();
            $table->string('quiere_equipo')->nullable();
            $table->string('que_marca')->nullable();
            $table->string('que_tecnologia')->nullable();
            $table->string('que_camara')->nullable();
            $table->string('observacion_del_asesor')->nullable();
            $table->string('primer_referido_nombres')->nullable();
            $table->string('primer_referido_apellidos')->nullable();
            $table->string('primer_referido_numero_movil')->nullable();
            $table->string('segundo_referido_nombres')->nullable();
            $table->string('segundo_referido_apellidos')->nullable();
            $table->string('segundo_referido_numero_movil')->nullable();
            $table->string('asesor')->nullable();
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('go_referidos');
    }
}