<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorasMedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horas_medicas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_consulta');
            $table->time('hora_inicio');
            $table->time('hora_termino');
            $table->string('descripcion');
            $table->string('comentarios_confirmacion')->nullable();
            $table->dateTime('fecha_confirmacion')->nullable();
            $table->string('comentarios_cancelacion')->nullable();
            $table->dateTime('fecha_cancelacion')->nullable();
            $table->dateTime('fecha_realizacion_consulta')->nullable();
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            //$table->unsignedBigInteger('id_usuario_confirma')->nullable();
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
            $table->unsignedBigInteger('id_asistente')->nullable();
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_estado');


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
        Schema::dropIfExists('horas_medicas');
    }
}