<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesContactoEmergenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_contacto_emergencia', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_contacto');
            $table->string('relacion')->nullable();
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
        Schema::dropIfExists('pacientes_contacto_emergencia');
    }
}
