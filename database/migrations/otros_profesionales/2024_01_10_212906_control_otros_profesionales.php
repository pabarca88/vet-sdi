<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ControlOtrosProfesionales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_control_oprof', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('dg_ingreso')->nullable();
            $table->string('evaluacion_control')->nullable();
            $table->string('plan_prop_evol')->nullable();
            $table->string('evol_result')->nullable();
            $table->string('ind_prox_control')->nullable();
            $table->date('prox_control')->nullable();
            $table->string('evol_indicaciones')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
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
        Schema::dropIfExists('ficha_control_oprof'); //
    }
}
