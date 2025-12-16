<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosDentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos_dental', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_profesional');
            $table->integer('id_ficha_atencion');
            $table->integer('id_lugar_atencion');
            $table->integer('id_tipo_tratamiento')->nullable();
            $table->json('datos_piezas_dentales');
            $table->integer('estado');
            $table->integer('aprobado');
            $table->date('fecha_control');
            $table->date('fecha');
            $table->integer('boca');
            $table->string('otros')->nullable();
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
        Schema::dropIfExists('presupuestos_dental');
    }
}
