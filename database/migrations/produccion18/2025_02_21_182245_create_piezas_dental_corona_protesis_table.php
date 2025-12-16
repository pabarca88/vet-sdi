<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiezasDentalCoronaProtesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piezas_dental_corona_protesis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_profesional');
            $table->integer('id_ficha_atencion');
            $table->integer('id_especialidad');
            $table->double('numero_pieza');
            $table->date('fecha');
            $table->integer('id_toma_medida');
            $table->string('nombre_paciente')->nullable();
            $table->string('nombre_laboratorio')->nullable();
            $table->integer('numero_orden')->nullable();
            $table->integer('id_prueba_ajuste');
            $table->string('prueba_ajuste')->nullable();
            $table->integer('id_pulido');
            $table->string('pulido')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('seccion')->default('pfu');
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
        Schema::dropIfExists('piezas_dental_corona_protesis');
    }
}
