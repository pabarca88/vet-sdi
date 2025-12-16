<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesBocaGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_boca_general', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_lugar_atencion');
            $table->integer('id_especialidad');
            $table->integer('id_profesional');
            $table->integer('id_ficha_atencion');
            $table->date('fecha');
            $table->integer('tipo_examen');
            $table->string('diagnostico');
            $table->string('comentario');
            $table->integer('terminado');
            $table->integer('agendar_control');
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
        Schema::dropIfExists('examenes_boca_general');
    }
}
