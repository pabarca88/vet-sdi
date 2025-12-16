<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteControlGlicemia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente_control_glicemia', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_paciente');
            $table->integer('alimento');
            $table->string('postprandial');
            $table->string('preprandial');
            $table->string('noche')->nullable();
            $table->string('observacion')->nullable();
            $table->dateTime('fecha');
            $table->integer('estado')->default(1);
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
        Schema::dropIfExists('paciente_control_glicemia');
    }
}
