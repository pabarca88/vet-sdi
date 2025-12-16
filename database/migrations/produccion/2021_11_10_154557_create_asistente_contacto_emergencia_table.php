<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenteContactoEmergenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistente_contacto_emergencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_asistente');
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
        Schema::dropIfExists('asistente_contacto_emergencia');
    }
}
