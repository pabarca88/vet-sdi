<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GineModalEcoGinecologica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modal_eco_ginecologia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_gineco_obstetrica');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_ficha_gine');
            $table->integer('eco_sol')->nullable();
            $table->string('sosp_dg')->nullable();
            $table->string('Prioridad')->nullable();
            $table->date('fecha')->nullable();
            $table->string('tipo')->nullable();
            $table->integer('sol_por')->nullable();
            $table->string('sol_por_nom')->nullable();
            $table->integer('motivo')->nullable();
            $table->string('mot_examen')->nullable();
            $table->string('ex_utero')->nullable();
            $table->string('endometrio')->nullable();
            $table->integer('ovario_der')->nullable();
            $table->string('ovario_izq')->nullable();
            $table->string('trompa_der')->nullable();
            $table->string('trompa_izq')->nullable();
            $table->string('fondo_saco')->nullable();
            $table->string('dg_ecografico')->nullable();
            $table->string('obs_eco')->nullable();
            $table->integer('img')->nullable();
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
        Schema::dropIfExists('modal_eco_ginecologia');
    }
}
