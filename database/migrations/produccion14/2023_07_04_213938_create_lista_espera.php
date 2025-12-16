<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaEspera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_espera', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_institucion');
            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_asistente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('observacion')->nullable();
            $table->bigInteger('estado')->default(1);
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
        Schema::dropIfExists('lista_espera');
    }
}
