<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTrasladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_traslados', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_condicion');
            $table->integer('id_destino');
            $table->integer('id_servicio_interno');
            $table->string('observaciones');
            $table->string('resultado');
            $table->integer('id_traslado_en');
            $table->string('otros')->nullable();
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
        Schema::dropIfExists('pacientes_traslados');
    }
}
