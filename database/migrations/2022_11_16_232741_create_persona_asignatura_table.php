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
            $table->id();
            $table->integer("id_asignatura");
            $table->string("rut_alumno");
            $table->integer("id_evaluacion");
            $table->float("nota");
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
