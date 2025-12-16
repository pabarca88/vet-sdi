<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionesOdontologiaGralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evoluciones_odontologia_gral', function (Blueprint $table) {
            $table->id();
            $table->string('pieza')->nullable()->comment('Pieza dental afectada');
            $table->text('evolucion')->nullable()->comment('Descripción de la evolución');
            $table->text('obs')->nullable()->comment('Observaciones');
            $table->string('id_procedimiento')->nullable()->comment('Procedimiento realizado');
            $table->unsignedBigInteger('id_ficha_atencion')->comment('ID de la ficha de atención');
            $table->unsignedBigInteger('id_paciente')->comment('ID del paciente');
            $table->unsignedBigInteger('id_profesional')->comment('ID del profesional');
            $table->unsignedBigInteger('id_lugar_atencion')->comment('ID del lugar de atención');
            $table->unsignedBigInteger('id_presupuesto')->nullable()->comment('ID del presupuesto asociado');
            $table->timestamps();

            // Índices para mejorar el rendimiento de las consultas
            $table->index('id_ficha_atencion');
            $table->index('id_paciente');
            $table->index('id_profesional');
            $table->index('id_lugar_atencion');
            $table->index('id_presupuesto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evoluciones_odontologia_gral');
    }
}
