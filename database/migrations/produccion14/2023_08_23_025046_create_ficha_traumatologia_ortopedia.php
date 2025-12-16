<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaTraumatologiaOrtopedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_traumatologia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_lugar_atencion')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_paciente')->nullable();
            $table->bigInteger('id_responsable')->nullable();
            $table->bigInteger('id_profesional')->nullable();
            $table->integer('sintoma_cons')->nullable();
            $table->string('obs_sintoma_cons')->nullable();
            $table->string('descripcion_consula')->nullable();
            $table->string('antec_especialidad_cig')->nullable();
            $table->string('antec_especialidad_gen')->nullable();
            $table->integer('e_localizacion')->nullable();
            $table->string('e_obs_localizacion')->nullable();
            $table->integer('e_signos_sintomas')->nullable();
            $table->string('obs_e_signos_sintomas')->nullable();
            $table->integer('e_crecimiento')->nullable();
            $table->string('obs_e_crecimiento')->nullable();
            $table->string('obs_e_masas_tumores')->nullable();
            $table->integer('e_causa_trau')->nullable();
            $table->string('obs_e_causa_trau')->nullable();
            $table->integer('e_cab_cuello_trau')->nullable();
            $table->string('obs_e_cab_cuello_trau')->nullable();
            $table->integer('e_columna_trau')->nullable();
            $table->string('obs_e_columna_trau')->nullable();
            $table->integer('e_parrilla_trau')->nullable();
            $table->string('obs_e_parrilla_trau')->nullable();
            $table->integer('e_ext_sup_trau')->nullable();
            $table->string('obs_e_ext_sup_trau')->nullable();
            $table->integer('e_pelvis_trau')->nullable();
            $table->string('obs_e_pelvis_trau')->nullable();
            $table->integer('e_ext_infer_trau')->nullable();
            $table->string('obs_e_ext_infer_trau')->nullable();
            $table->integer('e_tend_lig_trau')->nullable();
            $table->string('obs_e_tend_lig_trau')->nullable();
            $table->string('eval_eva_trau')->nullable();
            $table->string('obs_ex_segmentario')->nullable();
            $table->integer('hospen')->nullable();
            $table->string('obs_hospen')->nullable();
            $table->string('nom_inst')->nullable();
            $table->string('hosp_enserv')->nullable();
            $table->string('obs_hosp_enserv')->nullable();
            $table->integer('motivo_hosp')->nullable();
            $table->string('obs_motivo_hosp')->nullable();
            $table->string('obs_hospitalizar')->nullable();
            $table->string('eg_cpq_cg')->nullable();
            $table->string('hoc_cpa_cg')->nullable();
            $table->string('estado_inmovil_cpq_cg')->nullable();
            $table->string('masas_cpq_cg')->nullable();
            $table->string('estudios_rx_cpq_cg')->nullable();
            $table->string('obs_egp_cpq_cg')->nullable();
            $table->string('descripcion_hipotesis_trau')->nullable();
            $table->string('ind_esp_cirugia_trau')->nullable();
            $table->string('descripcion_cie_esp_trau')->nullable();
            $table->string('estado')->default(1);

            $table->timestamps();
        });

        Schema::create('ficha_ortopedia', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_lugar_atencion')->nullable();
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_paciente')->nullable();
            $table->bigInteger('id_responsable')->nullable();
            $table->bigInteger('id_profesional')->nullable();
            $table->string('peso_ort_inf')->nullable();
            $table->string('talla_ort_inf')->nullable();
            $table->integer('e_lact_mov_ort_inf')->nullable();
            $table->string('obs_e_lact_mov_ort_inf')->nullable();
            $table->string('e_mov_cerv_ort_inf')->nullable();
            $table->string('e_musc_ester_ort_inf')->nullable();
            $table->string('e_test_adams_ort_inf')->nullable();
            $table->string('e_ang_vello_ort_inf')->nullable();
            $table->string('e_cifo_lum_ort_inf')->nullable();
            $table->string('e_flx_codo_ort_inf')->nullable();
            $table->string('e_dedo_resort_ort_inf')->nullable();
            $table->string('e_rigidez_ort_inf')->nullable();
            $table->string('e_cadera_below_ort_inf')->nullable();
            $table->string('e_abduccion_ort_inf')->nullable();
            $table->string('e_plieg_poplit_ort_inf')->nullable();
            $table->string('e_rodi_flx_recur_ort_inf')->nullable();
            $table->string('e_pie_flex_dor_ort_inf')->nullable();
            $table->string('e_pie_val_retro_ort_inf')->nullable();
            $table->string('e_asp_plant_ort_inf')->nullable();
            $table->string('obs_ort_lactante')->nullable();
            $table->string('peso_ort_adul')->nullable();
            $table->string('talla_ort_adul')->nullable();
            $table->integer('e_manipulacion_ort_adul')->nullable();
            $table->string('obs_e_manipulacion_ort_adul')->nullable();
            $table->string('e_eval_eva_ort_adul')->nullable();
            $table->integer('e_carac_dolo_ort_adul')->nullable();
            $table->string('obs_e_carac_dolo_ort_adul')->nullable();
            $table->string('e_agravant_ort_adul')->nullable();
            $table->integer('e_marcha_ort_adul')->nullable();
            $table->string('obs_e_marcha_ort_adul')->nullable();
            $table->integer('e_postura_ort_adul')->nullable();
            $table->string('obs_e_postura_ort_adul')->nullable();
            $table->string('e_mov_vert_ort_adul')->nullable();
            $table->string('e_ritm_lum_pelv_ort_adul')->nullable();
            $table->string('e_indice_sagital_ort_adul')->nullable();
            $table->string('e_irri_radic_ort_adul')->nullable();
            $table->string('e_neuro_basi_ort_adul')->nullable();
            $table->string('e_balan_arti_ort_adul')->nullable();
            $table->string('e_balan_mus_manu_ort_adul')->nullable();
            $table->string('e_hiper_arti_ort_adul')->nullable();
            $table->string('e_dis_infe_ort_adul')->nullable();
            $table->string('e_signo_inflam_ort_adul')->nullable();
            $table->string('e_test_clin_ort_adul')->nullable();
            $table->string('obs_ort_adul')->nullable();
            $table->string('descripcion_hipotesis_ort')->nullable();
            $table->string('ind_esp_cirugia_ort')->nullable();
            $table->string('descripcion_cie_esp_ort')->nullable();
            $table->string('estado')->nullable();

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
        Schema::dropIfExists('ficha_traumatologia');
        Schema::dropIfExists('ficha_ortopedia');
    }
}
