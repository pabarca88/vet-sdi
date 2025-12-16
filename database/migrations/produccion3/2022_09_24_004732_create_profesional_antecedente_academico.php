<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalAntecedenteAcademico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional_antecedente_academico', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_tipo_antecedente_academico');
            $table->string('nombre');
            $table->string('universidad');
            $table->string('anio');
            $table->string('ciudad_pais');
            $table->string('numero_inscripcion')->nullable();
            $table->string('supersalud')->nullable();
            $table->string('numero_colegio')->nullable();
            $table->timestamps();
        });

        Schema::create('tipo_antecedente_academico', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
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
        Schema::drop('profesional_antecedente_academico');
        Schema::drop('tipo_antecedente_academico');
    }
}
