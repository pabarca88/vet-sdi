<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTratamientosVppbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos_vppb', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ficha');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_paciente');
            $table->integer('numero_sesion');
            $table->text('tipo_terapia');
            $table->text('comentarios');
            $table->timestamps();

            // Índices
            $table->index('id_ficha');
            $table->index('id_lugar_atencion');
            $table->index('id_profesional');
            $table->index('id_paciente');
            $table->index('numero_sesion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamientos_vppb');
    }
}
