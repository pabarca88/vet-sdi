<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlesEndodonciasPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controles_endodoncias_paciente', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('nro_pieza');
            $table->tinyInteger('respuesta_calor')->nullable();
            $table->tinyInteger('respuesta_frio')->nullable();
            $table->tinyInteger('electrico')->nullable();
            $table->tinyInteger('percucion')->nullable();
            $table->tinyInteger('exploracion')->nullable();
            $table->tinyInteger('cavitaria')->nullable();

            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
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
        Schema::dropIfExists('controles_endodoncias_paciente');
    }
}