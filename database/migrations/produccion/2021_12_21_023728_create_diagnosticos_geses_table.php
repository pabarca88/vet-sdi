<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticosGesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos_geses', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_institucion_ficha_ges');
            $table->string('direccion_institucion_ficha_ges');
            $table->string('nombre_responsable_ficha_ges');
            $table->string('rut_responsable_ficha_ges');
            $table->string('confirmacion_diagnostica_ficha_ges');
            $table->string('paciente_tratamiento_ficha_ges');
            $table->string('fecha_ficha_ges');
            $table->string('hora_ficha_ges');
            $table->string('nombre_ges');
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
        Schema::dropIfExists('diagnosticos_geses');
    }
}