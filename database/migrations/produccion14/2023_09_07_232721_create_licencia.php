<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencia', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_hora_medica')->nullable();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_lugar_atencion');
            $table->integer('enfermedad_comun');
            $table->integer('laboral');
            $table->bigInteger('paciente_prevision');
            $table->string('paciente_prevision_text');
            $table->string('rut_paciente');
            $table->string('empleador_id');
            $table->string('empleador_nombre');
            $table->string('empleador_rut');
            $table->string('empleador_direccion');
            $table->string('empleador_email');
            $table->integer('num_dias_reposo');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->integer('tipo_reposo');
            $table->integer('lugar_reposo');
            $table->integer('tipo_licencia');
            $table->integer('recuperabilidad_laboral'); //info_licencia_1
            $table->integer('tramite_invalidez'); //info_licencia_2
            $table->string('descripcion_hipotesis');
            $table->string('descripcion_cie');
            $table->integer('id_descripcion_cie');
            $table->text('otros_ant_desc')->nullable();
            $table->longText('examen_apoyo')->nullable();
            $table->integer('estado')->default(1);

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
        Schema::dropIfExists('licencia');
    }
}
