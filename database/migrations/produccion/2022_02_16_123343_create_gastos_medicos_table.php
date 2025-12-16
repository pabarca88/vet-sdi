<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos_medicos', function (Blueprint $table) {
            $table->id();
            $table->string('aseguradora');
            $table->string('nro_poliza');
            $table->string('empresa_asociada');
            $table->string('nombre_asegurado');
            $table->string('rut_asegurado');
            $table->string('prevision')->nullable();
            $table->string('nombre_paciente_asegurado');
            $table->string('tipo_carga')->nullable();
            $table->string('edad');
            $table->string('nro_carga')->nullable();
            $table->string('causa');
            $table->string('especifique_otro')->nullable();
            $table->string('diagnostico');
            $table->tinyInteger('continuidad_tratamiento')->default(0);
            $table->date('fecha_accidente');
            $table->tinyInteger('tipo_accidente');
            $table->date('fecha_prestacion');
            $table->string('bonos');
            $table->integer('total_documentos');
            $table->string('boletas');
            $table->string('recetas');
            $table->double('diferencia_reclamada');
            $table->string('otros')->nullable();
            $table->integer('nro_reclamos')->default(0);
            $table->date('fecha_ingreso');
            $table->string('otros1');
            $table->date('fecha_reclamo_anterior');
            $table->string('autorizacion_usuario')->nullable();
            $table->date('fecha_inicio_enfermedad');
            $table->date('fecha_primera_consulta');
            $table->date('fecha_consulta_medica');
            $table->string('nombre_paciente')->nullable();
            $table->string('edad_paciente')->nullable();
            $table->string('direccion_paciente')->nullable();
            $table->string('diagnostico_paciente');
            $table->tinyInteger('control')->default(0);
            $table->tinyInteger('embarazo')->nullable();
            $table->tinyInteger('numero_semanas')->nullable();
            $table->date('fur')->nullable();
            $table->tinyInteger('complicaciones_embarazo')->nullable();
            $table->tinyInteger('accidente')->default(0);
            $table->date('fecha_accidente1')->nullable();
            $table->string('tipo_accidente1')->nullable();
            $table->string('lugar_accidente');
            $table->string('fecha_informe')->nullable();

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
        Schema::dropIfExists('gastos_medicos');
    }
}