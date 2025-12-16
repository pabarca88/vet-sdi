<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesDentalPiezaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_dental_pieza', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_lugar_atencion');
            $table->integer('id_especialidad');
            $table->integer('id_profesional');
            $table->integer('id_ficha_atencion');
            $table->double('numero_pieza');
            $table->date('fecha_examen');
            $table->string('resp_calor');
            $table->string('resp_frio');
            $table->string('electrico');
            $table->string('percusion');
            $table->string('exploracion');
            $table->string('cavitaria');
            $table->integer('estado');
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('examenes_dental_pieza');
    }
}
