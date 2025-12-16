<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaGinecologia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_ginecologia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_gineco_obstetrica');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->integer('id_tunner')->nullable();
            $table->string('crecdes')->nullable();
            $table->string('examen_ext')->nullable();
            $table->string('tacto')->nullable();
            $table->string('obs_ex_gine')->nullable();
            $table->string('res_exam')->nullable();
            $table->string('desc_ex_mamas')->nullable();
            $table->string('obs_ex_mamas')->nullable();
            $table->string('res_ex_mamas')->nullable();
            $table->integer('mac')->nullable();
            $table->string('obs_t_mac')->nullable();
            $table->integer('mac_n')->nullable();
            $table->string('mac_n_nom')->nullable();
            $table->integer('mac_mec')->nullable();
            $table->string('mac_mec_obs')->nullable();
            $table->integer('mac_far')->nullable();
            $table->string('obs_mac_far')->nullable();
            $table->string('g_mac_obs')->nullable();
            $table->string('res_ex_mac')->nullable();
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
        Schema::dropIfExists('ficha_ginecologia');
    }
}
