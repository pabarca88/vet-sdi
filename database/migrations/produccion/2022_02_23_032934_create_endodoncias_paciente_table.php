<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEndodonciasPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endodoncias_paciente', function (Blueprint $table) {
            $table->id();
            $table->string('nro_pieza')->nullable();
            $table->string('derivado_por')->nullable();
            $table->string('zona_dolor')->nullable();
            $table->string('historia_anterior')->nullable();
            $table->string('tipo_dolor')->nullable();
            $table->string('provoca_dolor')->nullable();
            $table->string('tiempo_evolucion')->nullable();
            $table->string('examen_extraoral')->nullable();
            $table->string('examen__periodonto')->nullable();
            $table->string('examen_intraoral')->nullable();
            $table->string('radiologia1')->nullable();
            $table->string('radiologia2')->nullable();

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
        Schema::dropIfExists('endodoncias_paciente');
    }
}