<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesDentalPeriodonciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_dental_periodoncia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ficha_atencion');
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->unsignedBigInteger('id_profesional');
            $table->string('numero_pieza', 10);
            $table->string('sangrado', 50)->nullable();
            $table->string('supuracion', 100)->nullable();
            $table->string('higiene', 50)->nullable();
            $table->string('alt_mg', 10)->nullable();
            $table->string('p_sondaje', 10)->nullable();
            $table->string('mov_dent', 10)->nullable();
            $table->string('furca', 50)->nullable();
            $table->string('tipo_sonda', 100)->nullable();
            $table->text('obs_perio_pza')->nullable();


            // Índices para mejorar performance
            $table->index('id_ficha_atencion');
            $table->index('id_paciente');
            $table->index('id_lugar_atencion');
            $table->index('id_profesional');
            $table->index('numero_pieza');

            // Claves foráneas (comentadas - descomenta si tienes las tablas referenciadas)
            // $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atencion');
            // $table->foreign('id_paciente')->references('id')->on('pacientes');
            // $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion');
            // $table->foreign('id_profesional')->references('id')->on('profesionales');

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
        Schema::dropIfExists('examenes_dental_periodoncia');
    }
}
