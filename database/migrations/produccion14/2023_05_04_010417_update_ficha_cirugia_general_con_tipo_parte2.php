<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaCirugiaGeneralConTipoParte2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_cirugia_general', function (Blueprint $table) {

            /** agregar columnas */
            $table->integer('ex_cabcuello')->nullable()->after('obs_e_piel_fan');
            $table->string('obs_ex_cabcuello')->nullable()->after('ex_cabcuello');
            $table->integer('ex_torax')->nullable()->after('obs_ex_cabcuello');
            $table->string('obs_ex_torax')->nullable()->after('ex_torax');
            $table->integer('ex_abdomen')->nullable()->after('obs_ex_torax');
            $table->string('obs_ex_abdomen')->nullable()->after('ex_abdomen');
            $table->integer('ex_muscesq')->nullable()->after('obs_ex_abdomen');
            $table->string('obs_ex_muscesq')->nullable()->after('ex_muscesq');
            $table->integer('ex_o_sent')->nullable()->after('obs_ex_muscesq');
            $table->string('obs_ex_o_sent')->nullable()->after('ex_o_sent');
            $table->string('obs_ex_segmentario')->nullable()->after('obs_ex_o_sent');
            $table->integer('urgencia_cg')->nullable()->after('obs_ex_segmentario');
            $table->string('obs_urgencia_cg')->nullable()->after('urgencia_cg');
            $table->integer('hosp_cg')->nullable()->after('obs_urgencia_cg');
            $table->string('obs_hosp_cg')->nullable()->after('hosp_cg');
            $table->integer('otrotto_cg')->nullable()->after('obs_hosp_cg');
            $table->string('obs_otrotto_cg')->nullable()->after('otrotto_cg');
            $table->string('obs_plan_tratamiento')->nullable()->after('obs_otrotto_cg');
            $table->integer('hospen_cg')->nullable()->after('obs_plan_tratamiento');
            $table->string('obs_hospen_cg')->nullable()->after('hospen_cg');
            $table->integer('hosp_enserv_cg')->nullable()->after('obs_hospen_cg');
            $table->string('obs_hosp_enserv_cg')->nullable()->after('hosp_enserv_cg');
            $table->integer('otro_tto_cg')->nullable()->after('obs_hosp_enserv_cg');
            $table->string('obs_otro_tto_cg')->nullable()->after('otro_tto_cg');
            $table->string('obs_hospitalizacion_cg')->nullable()->after('obs_otro_tto_cg');

        });

        Schema::table('ficha_cirugia_general_tipo', function (Blueprint $table)
        {

            /** agregar columnas */
            $table->integer('ex_cabcuello')->nullable()->after('obs_e_piel_fan');
            $table->string('obs_ex_cabcuello')->nullable()->after('ex_cabcuello');
            $table->integer('ex_torax')->nullable()->after('obs_ex_cabcuello');
            $table->string('obs_ex_torax')->nullable()->after('ex_torax');
            $table->integer('ex_abdomen')->nullable()->after('obs_ex_torax');
            $table->string('obs_ex_abdomen')->nullable()->after('ex_abdomen');
            $table->integer('ex_muscesq')->nullable()->after('obs_ex_abdomen');
            $table->string('obs_ex_muscesq')->nullable()->after('ex_muscesq');
            $table->integer('ex_o_sent')->nullable()->after('obs_ex_muscesq');
            $table->string('obs_ex_o_sent')->nullable()->after('ex_o_sent');
            $table->string('obs_ex_segmentario')->nullable()->after('obs_ex_o_sent');
            $table->integer('urgencia_cg')->nullable()->after('obs_ex_segmentario');
            $table->string('obs_urgencia_cg')->nullable()->after('urgencia_cg');
            $table->integer('hosp_cg')->nullable()->after('obs_urgencia_cg');
            $table->string('obs_hosp_cg')->nullable()->after('hosp_cg');
            $table->integer('otrotto_cg')->nullable()->after('obs_hosp_cg');
            $table->string('obs_otrotto_cg')->nullable()->after('otrotto_cg');
            $table->string('obs_plan_tratamiento')->nullable()->after('obs_otrotto_cg');
            $table->integer('hospen_cg')->nullable()->after('obs_plan_tratamiento');
            $table->string('obs_hospen_cg')->nullable()->after('hospen_cg');
            $table->integer('hosp_enserv_cg')->nullable()->after('obs_hospen_cg');
            $table->string('obs_hosp_enserv_cg')->nullable()->after('hosp_enserv_cg');
            $table->integer('otro_tto_cg')->nullable()->after('obs_hosp_enserv_cg');
            $table->string('obs_otro_tto_cg')->nullable()->after('otro_tto_cg');
            $table->string('obs_hospitalizacion_cg')->nullable()->after('obs_otro_tto_cg');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
