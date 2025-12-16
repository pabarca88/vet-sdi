<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaFonoaudiologia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_fonoaudiologia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');

            $table->integer('eval_g_le')->nullable();
            $table->string('eval_g_le_obs')->nullable();
            $table->integer('eval_g_leti')->nullable();
            $table->string('eval_g_leti_obs')->nullable();
            $table->integer('eval_g_lr')->nullable();
            $table->string('eval_g_lr_obs')->nullable();

            $table->integer('eval_g_lrti')->nullable();
            $table->string('eval_g_lrti_obs')->nullable();
            $table->string('eval_g_leng_obs')->nullable();
            $table->integer('eval_aud')->nullable();
            $table->integer('eval_ofa')->nullable();
            $table->string('obs_ex_ofa')->nullable();

            $table->integer('vo_flu_voz')->nullable();
            $table->string('vo_flu_voz_obs')->nullable();
            $table->integer('vo_tpo_voz')->nullable();
            $table->string('vo_tpo_voz_obs')->nullable();
            $table->integer('vo_ritm')->nullable();
            $table->string('vo_ritm_obs')->nullable();

            $table->integer('vo_pro')->nullable();
            $table->string('vo_pro_obs')->nullable();
            $table->string('ex_voz_obs')->nullable();
            $table->string('ex_gral_obs')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('informe_fonoaudiologia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('ficha_fonoaudiologia');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('med_tte')->nullable();
            $table->string('nombre_paciente')->nullable();
            $table->string('edad')->nullable();
            $table->string('email')->nullable();
            $table->string('dg_fono')->nullable();
            $table->string('ses_real')->nullable();
            $table->string('ses_pend')->nullable();
            $table->string('tto_realizado')->nullable();
            $table->string('com_inf_fono')->nullable();
            $table->string('nomb_fono')->nullable();
            $table->date('prox_cont_fono')->nullable();
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
        Schema::dropIfExists('ficha_fonoaudiologia');
        Schema::dropIfExists('informe_fonoaudiologia');
    }
}
