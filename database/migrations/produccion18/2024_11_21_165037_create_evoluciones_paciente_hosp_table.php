<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvolucionesPacienteHospTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evoluciones_paciente_hosp', function (Blueprint $table) {
            $table->id();
            $table->integer('id_responsable');
            $table->integer('id_paciente');
            $table->date('fecha');
            $table->time('hora');
            $table->string('evolucion');
            $table->string('resumen');
            $table->integer('id_institucion')->nullable();
            $table->integer('id_lugar_atencion')->nullable();
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
        Schema::dropIfExists('evoluciones_paciente_hosp');
    }
}
