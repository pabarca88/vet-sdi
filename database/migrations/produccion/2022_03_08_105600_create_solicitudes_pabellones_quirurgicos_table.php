<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesPabellonesQuirurgicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_pabellones_quirurgicos', function (Blueprint $table) {
            $table->id();

            //datos generales de una cirugia
            $table->string('grado_urgencia')->nullable();
            $table->dateTime('fecha_hora_operacion')->nullable();
            $table->string('operacion')->nullable();
            $table->string('codigo_cirugia')->nullable();
            $table->string('anestesia')->nullable();
            $table->string('ayudante1')->nullable();
            $table->string('anestesista')->nullable();
            $table->string('arsenaleria')->nullable();
            $table->string('equipamiento_especial')->nullable();
            $table->string('codigo_cirugia_2')->nullable();
            $table->string('especialidad_1')->nullable();
            $table->string('especialidad_2')->nullable();
            $table->string('comentarios')->nullable();
            $table->string('tipo_cirugia')->nullable();

            //dental
            $table->string('patalogias_cronicas')->nullable();
            $table->string('diagnostico_preoperatorio')->nullable();
            $table->string('tipo_hospitalizacion')->nullable();
            $table->string('cirujano')->nullable();
            $table->string('ayudante2')->nullable();
            $table->string('instrumental_especial')->nullable();
            $table->string('insumos_especiales')->nullable();

            $table->string('anestesia_2')->nullable();
            $table->string('tipo_hospitalizacion_2')->nullable();
            $table->string('grado_urgencia_2')->nullable();

            //Parto Normal
            $table->string('cesareas_previas')->nullable();
            $table->integer('semanas_embarazo')->nullable();
            $table->string('evolucion')->nullable();
            $table->string('riesgo_fetal')->nullable();
            $table->string('riesgo_materno')->nullable();
            $table->string('patologia_embarazo')->nullable();
            $table->string('codigo_parto')->nullable();
            $table->string('tipo_hospital')->nullable();
            $table->string('neonatologo')->nullable();
            $table->string('matron')->nullable();

            //cesarea

            $table->string('enfermero')->nullable();

            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
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
        Schema::dropIfExists('solicitudes_pabellones_quirurgicos');
    }
}