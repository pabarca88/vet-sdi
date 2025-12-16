<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerapiaVozTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terapia_voz', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ficha');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_paciente');
            $table->integer('numero_sesion');
            $table->text('tipo_terapia');
            $table->text('comentarios');
            $table->timestamps();

            // Índices para mejorar el rendimiento
            $table->index('id_ficha');
            $table->index('id_lugar_atencion');
            $table->index('id_profesional');
            $table->index('id_paciente');
            $table->index(['id_ficha', 'numero_sesion'], 'idx_ficha_sesion');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terapia_voz');
    }
}
