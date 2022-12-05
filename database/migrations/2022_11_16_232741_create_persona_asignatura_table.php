<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_asignaturas', function (Blueprint $table) {
            // TABLA QUE EXISTE Y SE REFERENCIA SÓLO SI LA PERSONA TIENE ROL=2 (alumno)
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_asignatura');
            $table->unsignedBigInteger('id_curso');
            $table->unsignedBigInteger('rut_alumno');
            $table->integer('id_evaluacion');
            $table->float('nota');
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
        Schema::dropIfExists('personas_asignaturas');
    }
}
