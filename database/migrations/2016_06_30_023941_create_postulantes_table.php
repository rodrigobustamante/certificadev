<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut')->unique();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('telefono');
            $table->string('email');
            $table->string('direccion');
            $table->string('comuna');
            $table->string('educacion');
            $table->string('experiencia');
            $table->string('modalidad');
            $table->string('curso');
            $table->string('estado')->default('Pendiente');
            $table->timestamps('fecha_ingreso', 'fecha_modificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('postulantes');
    }
}
