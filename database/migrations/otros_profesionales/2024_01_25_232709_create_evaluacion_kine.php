<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionKine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('eval_pares_craneales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad')->nullable();
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('pc_uno')->nullable();
            $table->string('pc_dos')->nullable();
            $table->string('pc_tres')->nullable();
            $table->string('pc_cuatro')->nullable();
            $table->string('pc_cinco')->nullable();
            $table->string('pc_seis')->nullable();
            $table->string('pc_siete')->nullable();
            $table->string('pc_ocho')->nullable();
            $table->string('pc_nueve')->nullable();
            $table->string('pc_diez')->nullable();
            $table->string('pc_once')->nullable();
            $table->string('pc_doce')->nullable();
            $table->string('pc_concluciones')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('eval_sensibilidad', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad')->nullable();
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('sens_prim')->nullable();
            $table->string('sens_sec')->nullable();
            $table->string('sens_coment')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('eval_reflejos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad')->nullable();
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('ref_bicip')->nullable();
            $table->string('ref_tricip')->nullable();
            $table->string('ref_est_rad')->nullable();
            $table->string('ref_rot')->nullable();
            $table->string('ref_aquil')->nullable();
            $table->string('ref_cut')->nullable();
            $table->string('ref_cut_abd')->nullable();
            $table->string('ref_cremast')->nullable();
            $table->string('ref_plant')->nullable();
            $table->string('ref_pa')->nullable();
            $table->string('ref_concl')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('eval_postural', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad')->nullable();
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('ss_ant')->nullable();
            $table->string('ss_poster')->nullable();
            $table->string('ss_lat')->nullable();
            $table->string('ss_conc')->nullable();
            $table->string('sm_ant')->nullable();
            $table->string('sm_post')->nullable();
            $table->string('sm_lat')->nullable();
            $table->string('sm_conc')->nullable();
            $table->string('inf_ant')->nullable();
            $table->string('inf_post')->nullable();
            $table->string('inf_lat')->nullable();
            $table->string('inf_conc')->nullable();
            $table->string('post_eval')->nullable();
            $table->string('eval_gral_marcha')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('eval_metria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad')->nullable();
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('metria_pin')->nullable();
            $table->string('metria_ptr')->nullable();
            $table->string('metria_d')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('kine_planificacion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad')->nullable();
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->date('fec_inicio_tto')->nullable();
            $table->string('dg_ingreso')->nullable();
            $table->string('n_sesiones')->nullable();
            $table->string('obj')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
        Schema::create('kine_informe', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad')->nullable();
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('med_tte')->nullable();
            $table->string('dg_kine')->nullable();
            $table->string('ses_real')->nullable();
            $table->string('ses_pend')->nullable();
            $table->string('tto_realizado')->nullable();
            $table->string('com_inf_kine')->nullable();
            $table->date('prox_cont')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('eval_tono_motor', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad')->nullable();
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('ex_musc_grupo_es')->nullable();
            $table->integer('est_masa_musc')->nullable();
            $table->string('obs_est_masa_musc')->nullable();
            $table->string('obs_emm_ge')->nullable();
            $table->string('mov_inv_grupo_es')->nullable();
            $table->integer('est_mov_inv')->nullable();
            $table->string('obs_eminv')->nullable();
            $table->string('tono_grupo_estudio')->nullable();
            $table->integer('est_tono')->nullable();
            $table->string('obs_est_tono')->nullable();
            $table->string('obs_tono_musc_grupo_es')->nullable();
            $table->string('emg_grupo_es')->nullable();
            $table->integer('est_emg')->nullable();
            $table->string('obs_est_emg')->nullable();
            $table->integer('ecn')->nullable();
            $table->string('obs_ecn')->nullable();
            $table->string('emg_grupo_es')->nullable();
            $table->string('eval_est_mmgral')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('eval_funcionalidad_global', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad')->nullable();
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('cont_cab')->nullable();
            $table->string('cont_pelvis')->nullable();
            $table->string('cont_giros')->nullable();
            $table->string('cont_arrastre')->nullable();
            $table->string('cont_reinc')->nullable();
            $table->string('cont_cuad')->nullable();
            $table->string('cont_tronco')->nullable();
            $table->string('cont_sedest')->nullable();
            $table->string('cont_trans')->nullable();
            $table->string('cont_bipedest')->nullable();
            $table->string('cont_equil')->nullable();
            $table->string('cont_marcha')->nullable();
            $table->string('cont_coment')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });


        /** evaluar  tablas de eval_fuerza_mb_superior y eval_fuerza_mb_inferior con modal */
        // /** examen articulacion */
        // $table->id();
        // $table->bigInteger('id_especialidad')->nullable();
        // $table->bigInteger('id_tipo_especialidad')->nullable();
        // $table->bigInteger('id_ficha_atencion')->nullable();
        // $table->bigInteger('id_ficha_otros_prof')->nullable();
        // $table->bigInteger('id_profesional');
        // $table->bigInteger('id_paciente');
        // $table->integer('tipo_extremidades'); //inferior / superiro
        // $table->string('comentario_general')->nullable();


        // /** detalle examen articulacion */
        // $table->bigInteger('id_examen articulacion');
        // $table->bigInteger('id_articulacion');
        // $table->bigInteger('nombre_articulacion'); //articulac cadera //arod //apie
        // $table->string('flex_d')->nullable();
        // $table->string('flex_i')->nullable();
        // $table->string('exten_d')->nullable();
        // $table->string('exten_i')->nullable();
        // $table->string('abd_d')->nullable();
        // $table->string('abd_i')->nullable();
        // $table->string('aduc_d')->nullable();
        // $table->string('aduc_i')->nullable();
        // $table->string('comentarion_aticulacion')->nullable();
        Schema::create('eval_fuerza_mb_superior', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad')->nullable();
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');

            $table->string('ace_flex_d')->nullable();
            $table->string('ace_flex_i')->nullable();
            $table->string('ace_exten_d')->nullable();
            $table->string('ace_exten_i')->nullable();
            $table->string('ace_abd_d')->nullable();
            $table->string('ace_abd_i')->nullable();
            $table->string('ace_aduc_d')->nullable();
            $table->string('ace_aduc_i')->nullable();
            $table->string('ace_obs')->nullable();

            $table->string('eah_flex_d')->nullable();
            $table->string('ah_flex_i')->nullable();
            $table->string('ah_ext_d')->nullable();
            $table->string('ah_ext_i')->nullable();
            $table->string('ah_abd_d')->nullable();
            $table->string('ah_abd_i')->nullable();
            $table->string('ah_aduc_d')->nullable();
            $table->string('ah_aduc_i')->nullable();
            $table->string('ah_obs')->nullable();

            $table->string('ac_flex_d')->nullable();
            $table->string('ac_flex_i')->nullable();
            $table->string('ac_ext_d')->nullable();
            $table->string('ac_ext_i')->nullable();
            $table->string('ac_abd_d')->nullable();
            $table->string('ac_abd_i')->nullable();
            $table->string('ac_aduc_d')->nullable();
            $table->string('ac_aduc_i')->nullable();
            $table->string('ac_obs')->nullable();

            $table->string('arcd_flex_d')->nullable();
            $table->string('arcd_flex_i')->nullable();
            $table->string('arcd_ext_d')->nullable();
            $table->string('arcd_ext_i')->nullable();
            $table->string('arcd_abd_d')->nullable();
            $table->string('arcd_abd_i')->nullable();
            $table->string('arcd_aduc_d')->nullable();
            $table->string('arcd_aduc_i')->nullable();
            $table->string('arcd_obs')->nullable();

            $table->string('amu_flex_d')->nullable();
            $table->string('amu_flex_i')->nullable();
            $table->string('amu_ext_d')->nullable();
            $table->string('amu_ext_i')->nullable();
            $table->string('amu_abd_d')->nullable();
            $table->string('amu_abd_i')->nullable();
            $table->string('amu_aduc_d')->nullable();
            $table->string('amu_aduc_i')->nullable();
            $table->string('amu_obs')->nullable();

            $table->string('aded_flex_d')->nullable();
            $table->string('aded_flex_i')->nullable();
            $table->string('aded_ext_d')->nullable();
            $table->string('aded_ext_i')->nullable();
            $table->string('aded_abd_d')->nullable();
            $table->string('aded_abd_i')->nullable();
            $table->string('aded_aduc_d')->nullable();
            $table->string('aded_aduc_i')->nullable();
            $table->string('aded_obs')->nullable();

            $table->string('minga')->nullable();
            $table->string('extsup_coment')->nullable();


            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('eval_fuerza_mb_inferior', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad')->nullable();
            $table->bigInteger('id_tipo_especialidad')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');

            $table->string('acad_flex_d')->nullable();
            $table->string('acad_flex_i')->nullable();
            $table->string('acad_exten_d')->nullable();
            $table->string('acad_exten_i')->nullable();
            $table->string('acad_abd_d')->nullable();
            $table->string('acad_abd_i')->nullable();
            $table->string('acad_aduc_d')->nullable();
            $table->string('acad_aduc_i')->nullable();
            $table->string('acad_obs')->nullable();

            $table->string('arod_flex_d')->nullable();
            $table->string('arod_flex_i')->nullable();
            $table->string('arod_exten_d')->nullable();
            $table->string('arod_exten_i')->nullable();
            $table->string('arod_abd_d')->nullable();
            $table->string('arod_abd_i')->nullable();
            $table->string('aarod_aduc_d')->nullable();
            $table->string('arod_aduc_i')->nullable();
            $table->string('arod_obs')->nullable();

            $table->string('atob_flex_d')->nullable();
            $table->string('atob_flex_i')->nullable();
            $table->string('atob_exten_d')->nullable();
            $table->string('atob_exten_i')->nullable();
            $table->string('atob_abd_d')->nullable();
            $table->string('atob_abd_i')->nullable();
            $table->string('atob_aduc_d')->nullable();
            $table->string('atob_aduc_i')->nullable();
            $table->string('atob_obs')->nullable();

            $table->string('apie_flex_d')->nullable();
            $table->string('apie_flex_i')->nullable();
            $table->string('apie_exten_d')->nullable();
            $table->string('apie_exten_i')->nullable();
            $table->string('apie_abd_d')->nullable();
            $table->string('apie_abd_i')->nullable();
            $table->string('apie_aduc_d')->nullable();
            $table->string('apie_aduc_i')->nullable();
            $table->string('apie_obs')->nullable();



            $table->string('aded_flex_d')->nullable();
            $table->string('aded_flex_i')->nullable();
            $table->string('aded_ext_d')->nullable();
            $table->string('aded_ext_i')->nullable();
            $table->string('aded_abd_d')->nullable();
            $table->string('aded_abd_i')->nullable();
            $table->string('aded_aduc_d')->nullable();
            $table->string('aded_aduc_i')->nullable();
            $table->string('aded_obs')->nullable();

            $table->string('extinf_barre')->nullable();
            $table->string('extinf_coment')->nullable();

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
        Schema::dropIfExists('eval_pares_craneales');
        Schema::dropIfExists('eval_sensibilidad');
        Schema::dropIfExists('eval_reflejos');
        Schema::dropIfExists('eval_postural');
        Schema::dropIfExists('kine_planificacion');
        Schema::dropIfExists('kine_informe');
        Schema::dropIfExists('eval_metria');
        Schema::dropIfExists('eval_tono_motor');
        Schema::dropIfExists('eval_funcionalidad_global');
        Schema::dropIfExists('eval_fuerza_mb_superior');
        Schema::dropIfExists('eval_fuerza_mb_inferior');
    }
}
