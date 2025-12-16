<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclaracionesEnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declaraciones_eno', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_establecimiento');
            $table->string('codigo_establecimiento');
            $table->string('nombre_oficina');
            $table->string('codigo_oficina');
            // $table->string('rut');
            // $table->string('nombre');
            // $table->char('sexo');
            // $table->string('direccion');
            $table->string('nacionalidad_paciente');
            $table->string('codigo_nacionalidad_paciente');
            $table->string('ocupacion_paciente');
            $table->integer('pueblo_originario_paciente');
            $table->tinyInteger('condicion_paciente');
            $table->tinyInteger('categoria_paciente');
            $table->string('diagnositico_confirmado');

            $table->string('diagnostico_cie');
            $table->date('primeros_sintomas');
            $table->string('pais_contagio');
            $table->string('pais')->nullable();
            $table->tinyInteger('vacunacion');
            $table->date('fecha_ultima_dosis');
            $table->integer('numero_ultima_dosis');
            $table->string('tbc')->nullable();
            $table->string('tbc_recaidas')->nullable();
            $table->date('fecha_notificacion');
            $table->time('hora_notificacion');
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
        Schema::dropIfExists('declaraciones_eno');
    }
}