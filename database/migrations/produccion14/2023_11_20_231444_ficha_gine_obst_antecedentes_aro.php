<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaGineObstAntecedentesAro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_gineco_obst_ant_aro', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_ficha_gineco_obstetrica');
            $table->integer('id_ant_go')->nullable();
            $table->integer('aro_fact_mat')->nullable();
            $table->string('aro_fact_mat_obs')->nullable();
            $table->integer('aro_cp1')->nullable();
            $table->string('aro_cp1_obs')->nullable();
            $table->integer('aro_cp')->nullable();
            $table->integer('aro_cp_obs')->nullable();
            $table->integer('aro_m_puer')->nullable();
            $table->string('aro_m_puer_obs')->nullable();
            $table->integer('aro_fact_fet')->nullable();
            $table->string('aro_fact_fet_obs')->nullable();
            $table->integer('aro_otra_f')->nullable();
            $table->string('aro_otra_f_obs')->nullable();
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
        Schema::dropIfExists('ficha_gin_obst_ant_aro');
    }
}

