<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionVoz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion_voz', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('id_ficha_fono')->nullable();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');

            $table->string('edad')->nullable(); // - text
            $table->string('tpo_uso_vz')->nullable(); // - text
            $table->string('tpo_disf')->nullable(); // - text
            $table->string('tpo_exp_ruidos')->nullable(); // - text
            $table->string('audic')->nullable(); // - text
            $table->string('enf_resp')->nullable(); // - text
            $table->string('uso_med')->nullable(); // - text
            $table->string('pat_ant')->nullable(); // - text
            $table->string('habitos')->nullable(); // - text
            $table->string('ttos_ant')->nullable(); // - text
            $table->string('voz_obs_gen')->nullable(); // - textarea
            $table->integer('ev_voz_vest_boc')->nullable(); // - select-one
            $table->string('ev_voz_vest_boc_obs')->nullable(); // - textarea
            $table->integer('ev_voz_fre_sup')->nullable(); // - select-one
            $table->string('ev_voz_fre_sup_obs')->nullable(); // - textarea
            $table->integer('ev_voz_fr_inf')->nullable(); // - select-one
            $table->string('ev_voz_fr_inf_obs')->nullable(); // - textarea
            $table->integer('ev_voz_fr_sl')->nullable(); // - select-one
            $table->string('ev_voz_fr_sl_obs')->nullable(); // - textarea
            $table->integer('ev_voz_pd')->nullable(); // - select-one
            $table->string('ev_voz_pd_obs')->nullable(); // - textarea
            $table->integer('ev_voz_pb')->nullable(); // - select-one
            $table->string('ev_voz_pb_obs')->nullable(); // - textarea
            $table->integer('ev_voz_cvf')->nullable(); // - select-one
            $table->string('ev_voz_cvf_obs')->nullable(); // - textarea
            $table->integer('ev_voz_uvul')->nullable(); // - select-one
            $table->string('ev_voz_uvul_obs')->nullable(); // - textarea
            $table->integer('ev_voz_amig')->nullable(); // - select-one
            $table->string('ev_voz_amig_obs')->nullable(); // - textarea
            $table->integer('ev_voz_aden')->nullable(); // - select-one
            $table->string('ev_voz_aden_obs')->nullable(); // - textarea
            $table->string('ev_voz_boc_obs')->nullable(); // - textarea
            $table->string('posic_estatica')->nullable(); // - text
            $table->string('posic_dinamica')->nullable(); // - text
            $table->integer('ev_vf')->nullable(); // - select-one
            $table->string('ev_vf_obs')->nullable(); // - textarea
            $table->integer('ev_vext')->nullable(); // - select-one
            $table->string('ev_vext_obs')->nullable(); // - textarea
            $table->integer('ev_vro')->nullable(); // - select-one
            $table->string('ev_vro_obs')->nullable(); // - textarea
            $table->integer('ev_vflat')->nullable(); // - select-one
            $table->string('ev_vflat_obs')->nullable(); // - textarea
            $table->integer('ev_val')->nullable(); // - select-one
            $table->string('ev_val_obs')->nullable(); // - textarea
            $table->string('ev_val_ep_obs')->nullable(); // - textarea
            $table->integer('ex_resp_torax')->nullable(); // - select-one
            $table->string('ex_resp_torax_obs')->nullable(); // - textarea
            $table->string('resp_din')->nullable(); // - text
            $table->integer('resp_col')->nullable(); // - select-one
            $table->string('resp_col_obs')->nullable(); // - textarea
            $table->integer('resp_tpo_resp')->nullable(); // - select-one
            $table->string('resp_tpo_resp_obs')->nullable(); // - textarea
            $table->integer('resp_modo')->nullable(); // - select-one
            $table->string('resp_modo_obs')->nullable(); // - textarea
            $table->integer('soplo_dur')->nullable(); // - select-one
            $table->string('soplo_dur_obs')->nullable(); // - textarea
            $table->integer('soplo_fza')->nullable(); // - select-one
            $table->string('soplo_fza_obs')->nullable(); // - textarea
            $table->integer('coord_fono_resp')->nullable(); // - select-one
            $table->string('coord_fono_resp_obs')->nullable(); // - textarea
            $table->string('ex_respiratorio_obs')->nullable(); // - textarea
            $table->integer('ataque_voc')->nullable(); // - select-one
            $table->string('ataque_voc_obs')->nullable(); // - textarea
            $table->integer('ton_voc')->nullable(); // - select-one
            $table->string('ton_voc_obs')->nullable(); // - textarea
            $table->integer('int_voz')->nullable(); // - select-one
            $table->string('int_voz_obs')->nullable(); // - textarea
            $table->string('param_voc_obs')->nullable(); // - textarea

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
        Schema::dropIfExists('evaluacion_voz');
    }
}
