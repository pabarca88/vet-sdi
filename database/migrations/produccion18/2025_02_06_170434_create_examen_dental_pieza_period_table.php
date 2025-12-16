<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenDentalPiezaPeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_dental_pieza_period', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_lugar_atencion');
            $table->integer('id_especialidad');
            $table->integer('id_profesional');
            $table->integer('id_ficha_atencion');
            $table->double('numero_pieza');
            $table->date('fecha_examen');
            $table->string('perdida');
            $table->string('tiempo');
            $table->integer('biopsia');
            $table->string('zona_y_motivo');
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
        Schema::dropIfExists('examen_dental_pieza_period');
    }
}
