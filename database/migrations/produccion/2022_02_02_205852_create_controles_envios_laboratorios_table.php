<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlesEnviosLaboratoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles_envios_laboratorios', function (Blueprint $table) {
            $table->id();

            $table->string('nro_etiquetado');
            $table->string('clinica')->nullable();
            $table->string('doctor')->nullable();
            $table->string('rut_profesional')->nullable();
            $table->tinyInteger('grado_urgencia')->default(0);
            $table->string('guia')->nullable();
            $table->string('color')->nullable();
            $table->string('material')->nullable();
            $table->string('trabajo_realizar')->nullable();
            $table->string('contenido_envio');
            $table->string('comentarios')->nullable();

            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_laboratorio')->nullable();
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
        Schema::dropIfExists('controles_envios_laboratorios');
    }
}