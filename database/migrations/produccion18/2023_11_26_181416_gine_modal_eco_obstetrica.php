<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GineModalEcoObstetrica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modal_eco_obstetrica', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('id_ficha_gineco_obstetrica');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_ficha_gine')->nullable();
            $table->integer('eco_sol')->nullable();
            $table->string('sosp_dg')->nullable();
            $table->string('Prioridad')->nullable();
            $table->date('fecha')->nullable();
            $table->string('tipo')->nullable();
            $table->integer('sol_por')->nullable();
            $table->string('sol_por_nom')->nullable();
            $table->integer('motivo')->nullable();
            $table->string('mot_examen')->nullable();
            $table->string('fur')->nullable();
            $table->string('fpp')->nullable();
            $table->integer('e_gest')->nullable();
            $table->string('num_gest')->nullable();
            $table->string('lcc')->nullable();
            $table->string('diametro_cef')->nullable();
            $table->string('peso_fetal')->nullable();
            $table->string('edad_ecografia')->nullable();
            $table->string('placenta')->nullable();
            $table->string('liq_amniotico')->nullable();
            $table->string('sexo')->nullable();
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
        Schema::dropIfExists('modal_eco_obstetrica');
    }
}
