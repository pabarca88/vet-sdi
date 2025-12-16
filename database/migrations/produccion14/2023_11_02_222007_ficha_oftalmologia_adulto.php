<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//E:\laragon_7\www\medichile_sistema\database\migrations\2023_11_02_222007_ficha_oftalmologia_adulto.php
class FichaOftalmologiaAdulto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** ok */
        Schema::create('ficha_oftalmologia_adulto', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('tto_ojo')->nullable();
            $table->string('rec_tto_ojo')->nullable();
            $table->integer('pr_ojo')->nullable();
            $table->string('tipo_proc_ojo')->nullable();
            $table->string('plan_proc_ojo')->nullable();
            $table->integer('r_lentes')->nullable();
            $table->integer('ojo_cir')->nullable();
            $table->string('obs_gen_plan_tto')->nullable();
            $table->string('obs_ex_generales')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        /** ok */
        Schema::create('oftalmo_receta_lente', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('tipo_lentes')->nullable();
            $table->integer('lentes_para')->nullable();
            $table->string('lentes_para_texto', 30)->nullable();
            $table->string('r_oi_esfera', 10)->nullable();
            $table->string('r_oi_cilindro', 10)->nullable();
            $table->string('r_oi_valor_eje', 10)->nullable();
            $table->string('r_oi_add', 10)->nullable();
            $table->string('r_oi_prisma', 10)->nullable();
            $table->string('r_oi_dip', 10)->nullable();
            $table->string('r_oi_obs')->nullable();
            $table->string('r_od_esfera', 10)->nullable();
            $table->string('r_od_cilindro', 10)->nullable();
            $table->string('r_od_valor_eje', 10)->nullable();
            $table->string('r_od_add', 10)->nullable();
            $table->string('r_od_prisma', 10)->nullable();
            $table->string('r_od_dip', 10)->nullable();
            $table->string('r_od_obs')->nullable();
            $table->string('r_obs')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        /** biomicroscopia ok */
        /** fondeo de ojo  ok*/

        /** ok */
        Schema::create('oftalmo_examen_agudeza_visual', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_oftalmologia_adulto');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('av_subj_sc_od')->nullable();
            $table->string('obs_av_subj_sc_od')->nullable();
            $table->integer('av_subj_sc_oi')->nullable();
            $table->string('obs_av_subj_sc_oi')->nullable();
            $table->integer('av_cc_od')->nullable();
            $table->string('obs_av_cc_od')->nullable();
            $table->integer('av_cc_oi')->nullable();
            $table->string('obs_av_cc_oi')->nullable();
            $table->integer('av_autorefrac_od')->nullable();
            $table->string('obs_av_autorefrac_od')->nullable();
            $table->integer('av_autorefrac_oi')->nullable();
            $table->string('obs_av_autorefrac_oi')->nullable();
            $table->string('av_ret_od_cc')->nullable();
            $table->string('av_ret_oi_cc')->nullable();
            $table->string('av_ret_od_sc')->nullable();
            $table->string('av_ret_oi_sc')->nullable();
            $table->string('av_add')->nullable();
            $table->string('av_dip')->nullable();
            $table->string('av_pris_od')->nullable();
            $table->string('av_pris_oi')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        /** ok */
        Schema::create('oftalmo_examen_neurologico', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_oftalmologia_adulto');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('ne_mov_oculares')->nullable();
            $table->string('obs_ne_mov_oculares')->nullable();
            $table->integer('ne_pupul')->nullable();
            $table->string('obs_ne_pupul')->nullable();
            $table->integer('ne_rfm')->nullable();
            $table->string('obs_ne_rfm')->nullable();
            $table->integer('ne_dpar')->nullable();
            $table->string('obs_ne_dpar')->nullable();
            $table->integer('ne_diplo')->nullable();
            $table->string('obs_ne_diplo')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        /** ok */
        Schema::create('oftalmo_examen_presion_ocular', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_oftalmologia_adulto');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('po_od')->nullable();
            $table->string('obs_po_od')->nullable();
            $table->string('po_val_od')->nullable();
            $table->integer('po_oi')->nullable();
            $table->string('obs_po_oi')->nullable();
            $table->string('po_val_oi')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        /** ok */
        Schema::create('oftalmo_examen_vision_colores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_oftalmologia_adulto');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('v_col_test')->nullable();
            $table->string('obs_v_col_test')->nullable();
            $table->integer('v_col_tipo')->nullable();
            $table->string('obs_tipo_v_col')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        /** ok */
        Schema::create('oftalmo_examen_estrabismo', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_oftalmologia_adulto');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('est_ct_int')->nullable();
            $table->string('obs_est_ct_int')->nullable();
            $table->integer('est_ct_alt')->nullable();
            $table->string('obs_est_ct_alt')->nullable();
            $table->integer('est_ct_prisma')->nullable();
            $table->string('obs_est_ct_prisma')->nullable();
            $table->integer('est_test_hirsch')->nullable();
            $table->string('obs_est_test_hirsch')->nullable();
            $table->integer('est_Krim')->nullable();
            $table->string('obs_est_Krim')->nullable();
            $table->string('est_ot_est')->nullable();
            $table->string('obs_est_estr')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        /** ok */
        Schema::create('oftalmo_examen_mov_oculares', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_oftalmologia_adulto');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('ducciones')->nullable();
            $table->string('obs_ducc')->nullable();
            $table->integer('versiones')->nullable();
            $table->string('obs_versiones')->nullable();
            $table->integer('vergencia')->nullable();
            $table->string('obs_vergencia')->nullable();
            $table->integer('estereop')->nullable();
            $table->string('obs_estereop')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        /** ok */
        Schema::create('oftalmo_examen_campo_visual', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_oftalmologia_adulto');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('campo_visual_od')->nullable();
            $table->string('obs_campo_visual_od')->nullable();
            $table->integer('campo_visual_oi')->nullable();
            $table->string('obs_campo_visual_oi')->nullable();
            $table->string('otros_ex_general')->nullable();
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
        Schema::dropIfExists('oftalmologia_adulto');
        Schema::dropIfExists('oftalmo_receta_lente');
        Schema::dropIfExists('oftalmo_examen_agudeza_visual');
        Schema::dropIfExists('oftalmo_examen_neurologico');
        Schema::dropIfExists('oftalmo_examen_presion_ocular');
        Schema::dropIfExists('oftalmo_examen_vision_colores');
        Schema::dropIfExists('oftalmo_examen_estrabismo');
        Schema::dropIfExists('oftalmo_examen_mov_oculares');
        Schema::dropIfExists('oftalmo_examen_campo_visual');
    }
}
