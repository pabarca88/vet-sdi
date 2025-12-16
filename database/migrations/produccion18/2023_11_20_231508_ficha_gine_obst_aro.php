<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaGineObstAro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_gin_obst_aro', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_ficha_gineco_obstetrica');
            $table->integer('id_ficha_ant_aro')->nullable();
            $table->string('aro_feto_eg')->nullable();
            $table->string('aro_feto_fpp_fur')->nullable();
            $table->string('aro_feto_fpp_eco')->nullable();
            $table->string('aro_feto_fpp_au')->nullable();
            $table->integer('aro_s_pat_ea')->nullable();
            $table->string('aro_s_pat_ea_obs')->nullable();
            $table->integer('aro_cont_ea')->nullable();
            $table->string('aro_cont_ea_obs')->nullable();
            $table->string('aro_cont_ea_obs_gl')->nullable();
            $table->integer('aro_ea_mam')->nullable();
            $table->string('aro_ea_mam_obs')->nullable();
            $table->integer('aro_ea_gine')->nullable();
            $table->string('aro_ea_gine_obs')->nullable();
            $table->string('aro_ea_m_au')->nullable();
            $table->integer('aro_ea_m_o')->nullable();
            $table->string('aro_ea_m_ot_obs')->nullable();
            $table->integer('aro_ea_m_exgin')->nullable();
            $table->string('aro_ea_m_exgin_obs')->nullable();
            $table->string('aro_ea_m_pe')->nullable();
            $table->string('aro_ea_m_ede')->nullable();
            $table->string('aro_ea_m_pa')->nullable();
            $table->string('aro_ea_m_p')->nullable();
            $table->string('aro_ea_m_obs')->nullable();
            $table->string('aro_fur_fpp_act')->nullable();
            $table->string('aro_resp_cont_act')->nullable();
            $table->string('aro_tam_fet_act')->nullable();
            $table->string('aro_alt_uter_act')->nullable();
            $table->string('aro_ex_fetal_act_obs')->nullable();
            $table->string('aro_obs_eco_fetal_act')->nullable();
            $table->string('fp_normal')->nullable();
            $table->integer('adel_fp')->nullable();
            $table->integer('hosp_aro')->nullable();
            $table->string('obs_plan_tto_em_aro')->nullable();
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
        Schema::dropIfExists('ficha_gin_obst_aro');
    }
}
