<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaGinecoContObstetrico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_gin_cont_obstetrico', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_ficha_gineco_obstetrica');
            $table->date('ed_gest')->nullable();
            $table->date('fpp_fur')->nullable();
            $table->date('fpp_eco')->nullable();
            $table->date('fpp_aut')->nullable();
            $table->integer('sosp_pat_emb')->nullable();
            $table->string('sosp_pat_emb_obs')->nullable();
            $table->integer('control_emb')->nullable();
            $table->string('control_emb_obs')->nullable();
            $table->string('obs_grl_emb')->nullable();
            $table->integer('riesg_pat_grl')->nullable();
            $table->string('riesg_pat_grl_obs')->nullable();
            $table->integer('pat_prev_emb')->nullable();
            $table->string('pat_prev_emb_obs')->nullable();
            $table->string('pat_prev_emb_obs_gl')->nullable();
            $table->integer('id_modal_fact_riesgo')->nullable();
            $table->integer('riesg_pat_act')->nullable();
            $table->string('riesg_pat_act_obs')->nullable();
            $table->integer('rieg_pat_emb')->nullable();
            $table->string('rieg_pat_emb_obs')->nullable();
            $table->string('rieg_pat_emb_obs_grl')->nullable();
            $table->integer('cont_emb_mamas')->nullable();
            $table->string('cont_emb_mamas_obs')->nullable();
            $table->integer('cont_emb_gine')->nullable();
            $table->string('cont_emb_gine_obs')->nullable();
            $table->string('cont_emb_au_gine')->nullable();
            $table->integer('cont_emb_otros')->nullable();
            $table->string('cont_emb_otros_obs')->nullable();
            $table->string('cont_emb_mat_obs_grl')->nullable();
            $table->string('feto_lcf')->nullable();
            $table->string('feto_resp_cont')->nullable();
            $table->string('feto_tam')->nullable();
            $table->string('feto_aut')->nullable();
            $table->string('feto_obs_grl')->nullable();
            $table->integer('cont_rutina')->nullable();
            $table->integerg('der_emb_aro')->nullable();
            $table->integer('sol_hosp')->nullable();
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
        Schema::dropIfExists('ficha_gin_cont_obstetrico');
    }
}
