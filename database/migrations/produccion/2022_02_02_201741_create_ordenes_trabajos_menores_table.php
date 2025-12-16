<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTrabajosMenoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_trabajos_menores', function (Blueprint $table) {
            $table->id();
            $table->string('nro_orden');
            $table->string('clinica_doctor');
            $table->string('rut_profesional')->nullable();
            $table->string('guia');
            $table->string('color');
            $table->string('urgencia');
            $table->string('material');
            $table->string('trabajo_realizar');
            $table->string('comentarios')->nullable();

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
        Schema::dropIfExists('ordenes_trabajos_menores');
    }
}