<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaVenereas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_venereas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('select_1_ven_sint');
            $table->string('select_2_ven_ant_pat_ant');
            $table->string('ot_ant_ven_pat');
            $table->string('select_6_ven_gen');
            $table->string('select_7_ven_ant_cond');
            $table->string('select_8_ven_prot');
            $table->string('select_9_ven_cont_sos');
            $table->string('select_3_ven_ant_pat_pater');
            $table->string('select_4_ven_ant_pat_mater');
            $table->string('select_5_pat_ssfam');
            $table->string('ven_ex_fg');
            $table->string('ven_ex_pm');
            $table->string('ven_obs_egp');
            $table->string('ven_gen_masc');
            $table->string('ven_gen_fem');
            $table->string('imagenes_ven_pre')->nullable();
            $table->string('imagenes_ven_post')->nullable();
            $table->string('obs_fotos_ven');
            $table->integer('tto_ven');
            $table->integer('pr_ven');
            $table->integer('hosp_ven');
            $table->string('recom_tto_ven');
            $table->string('tipo_proc_ven');
            $table->string('plan_ven_proc');
            $table->string('obs_plan_tratamiento');
            $table->string('otro');
            $table->string('otro1');
            $table->integer('estado');
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
        Schema::dropIfExists('ficha_venereas');
    }
}
