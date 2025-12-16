<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaOft extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_oft', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');

            $table->string('descripcion_consulta_oftalmo')->nullable();
            $table->string('antec_especialidad_oftalmo')->nullable();

            $table->integer('agudeza_visual_subj_od')->nullable();
            $table->string('obs_agudeza_visual_subj_od')->nullable();
            $table->integer('agudeza_visual_subj_oi')->nullable();
            $table->string('obs_agudeza_visual_subj_oi')->nullable();
            $table->integer('agudeza_visual_obj_od')->nullable();
            $table->string('obs_agudeza_visual_obj_od')->nullable();
            $table->integer('agudeza_visual_obj_oi')->nullable();
            $table->string('obs_agudeza_visual_obj_oi')->nullable();
            $table->integer('mov_oculares')->nullable();
            $table->string('obs_mov_oculares')->nullable();
            $table->integer('autorefracto_od')->nullable();
            $table->string('obs_autorefracto_od')->nullable();
            $table->integer('autorefracto_oi')->nullable();
            $table->string('obs_autorefracto_oi')->nullable();
            $table->integer('presion_ocular_od')->nullable();
            $table->string('obs_presion_ocular_od')->nullable();
            $table->string('valor_presion_ocular_od')->nullable();
            $table->integer('presion_ocular_oi')->nullable();
            $table->string('obs_presion_ocular_oi')->nullable();
            $table->string('valor_presion_ocular_oi')->nullable();
            $table->integer('campo_visual_od')->nullable();
            $table->string('obs_campo_visual_od')->nullable();
            $table->integer('campo_visual_oi')->nullable();
            $table->string('obs_campo_visual_oi')->nullable();
            $table->string('campo_otros_ex_general')->nullable();

            $table->string('descripcion_hipotesis')->nullable();
            $table->string('ind_oft')->nullable();
            $table->string('descripcion_cie')->nullable();

            $table->integer('tratamiento')->nullable();
            $table->integer('lentes')->nullable();
            $table->integer('procedimiento')->nullable();
            $table->integer('cirugia')->nullable();

            $table->string('otro')->nullable();
            $table->string('otro2')->nullable();

            $table->integer('estado')->default(1)->nullable();

            $table->timestamps();
        });
        Schema::create('ficha_oft_tipo', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_profesional');
            $table->string('nombre');
            $table->string('descripcion')->nullable();

            $table->integer('agudeza_visual_subj_od')->nullable();
            $table->string('obs_agudeza_visual_subj_od')->nullable();
            $table->integer('agudeza_visual_subj_oi')->nullable();
            $table->string('obs_agudeza_visual_subj_oi')->nullable();
            $table->integer('agudeza_visual_obj_od')->nullable();
            $table->string('obs_agudeza_visual_obj_od')->nullable();
            $table->integer('agudeza_visual_obj_oi')->nullable();
            $table->string('obs_agudeza_visual_obj_oi')->nullable();
            $table->integer('mov_oculares')->nullable();
            $table->string('obs_mov_oculares')->nullable();
            $table->integer('autorefracto_od')->nullable();
            $table->string('obs_autorefracto_od')->nullable();
            $table->integer('autorefracto_oi')->nullable();
            $table->string('obs_autorefracto_oi')->nullable();
            $table->integer('presion_ocular_od')->nullable();
            $table->string('obs_presion_ocular_od')->nullable();
            $table->string('valor_presion_ocular_od')->nullable();
            $table->integer('presion_ocular_oi')->nullable();
            $table->string('obs_presion_ocular_oi')->nullable();
            $table->string('valor_presion_ocular_oi')->nullable();
            $table->integer('campo_visual_od')->nullable();
            $table->string('obs_campo_visual_od')->nullable();
            $table->integer('campo_visual_oi')->nullable();
            $table->string('obs_campo_visual_oi')->nullable();
            $table->string('campo_otros_ex_general')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro2')->nullable();

            $table->integer('estado')->default(1)->nullable();

            $table->timestamps();
        });

        Schema::create('ficha_oft_biomicroscopia', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_ficha_oft');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');

            $table->integer('parpbiood')->nullable();
            $table->string('obs_parpbiood')->nullable();
            $table->integer('conjuntiva_bio_od')->nullable();
            $table->string('obs_conjuntiva_bio_od')->nullable();
            $table->integer('biocornea_od')->nullable();
            $table->string('obs_biocornea_od')->nullable();
            $table->integer('camara_ant_od')->nullable();
            $table->string('obs_camara_ant_od')->nullable();
            $table->integer('tyndall_od')->nullable();
            $table->string('obs_tyndall_od')->nullable();
            $table->integer('cristalino_bio_od')->nullable();
            $table->string('obs_cristalino_bio_od')->nullable();
            $table->string('campo_otros_bio_od')->nullable();
            $table->integer('parpbiooi')->nullable();
            $table->string('obs_parpbiooi')->nullable();
            $table->integer('conjuntiva_bio_oi')->nullable();
            $table->string('obs_conjuntiva_bio_oi')->nullable();
            $table->integer('biocornea_oi')->nullable();
            $table->string('obs_biocornea_oi')->nullable();
            $table->integer('camara_ant_oi')->nullable();
            $table->string('obs_camara_ant_oi')->nullable();
            $table->integer('tyndall_oi')->nullable();
            $table->string('obs_tyndall_oi')->nullable();
            $table->integer('cristalino_bio_oi')->nullable();
            $table->string('obs_cristalino_bio_oi')->nullable();
            $table->string('campo_otros_bio_oi')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro2')->nullable();

            $table->integer('estado')->default(1)->nullable();

            $table->timestamps();
        });
        Schema::create('ficha_oft_biomicroscopia_tipo', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_profesional');
            $table->string('nombre');
            $table->string('descripcion')->nullable();

            $table->integer('parpbiood')->nullable();
            $table->string('obs_parpbiood')->nullable();
            $table->integer('conjuntiva_bio_od')->nullable();
            $table->string('obs_conjuntiva_bio_od')->nullable();
            $table->integer('biocornea_od')->nullable();
            $table->string('obs_biocornea_od')->nullable();
            $table->integer('camara_ant_od')->nullable();
            $table->string('obs_camara_ant_od')->nullable();
            $table->integer('tyndall_od')->nullable();
            $table->string('obs_tyndall_od')->nullable();
            $table->integer('cristalino_bio_od')->nullable();
            $table->string('obs_cristalino_bio_od')->nullable();
            $table->string('campo_otros_bio_od')->nullable();
            $table->integer('parpbiooi')->nullable();
            $table->string('obs_parpbiooi')->nullable();
            $table->integer('conjuntiva_bio_oi')->nullable();
            $table->string('obs_conjuntiva_bio_oi')->nullable();
            $table->integer('biocornea_oi')->nullable();
            $table->string('obs_biocornea_oi')->nullable();
            $table->integer('camara_ant_oi')->nullable();
            $table->string('obs_camara_ant_oi')->nullable();
            $table->integer('tyndall_oi')->nullable();
            $table->string('obs_tyndall_oi')->nullable();
            $table->integer('cristalino_bio_oi')->nullable();
            $table->string('obs_cristalino_bio_oi')->nullable();
            $table->string('campo_otros_bio_oi')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro2')->nullable();

            $table->integer('estado')->default(1)->nullable();

            $table->timestamps();
        });

        Schema::create('ficha_oft_fondo_ojo', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_ficha_oft');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');

            $table->string('papilas_fo_od')->nullable();
            $table->string('obs_papilas_fo_od')->nullable();
            $table->string('excavacion_fo_od')->nullable();
            $table->string('obs_excavacion_fo_od')->nullable();
            $table->string('bordes_od')->nullable();
            $table->string('obs_bordes_od')->nullable();
            $table->string('maculas_fo_od')->nullable();
            $table->string('obs_maculas_fo_od')->nullable();
            $table->string('vasos_fo_od')->nullable();
            $table->string('obs_vasos_fo_od')->nullable();
            $table->string('periferia_fo_od')->nullable();
            $table->string('obs_periferia_fo_od')->nullable();
            $table->string('campo_fo_otros_od')->nullable();
            $table->string('papilas_fo_oi')->nullable();
            $table->string('obs_papilas_fo_oi')->nullable();
            $table->string('excavacion_fo_oi')->nullable();
            $table->string('obs_excavacion_fo_oi')->nullable();
            $table->string('bordes_oi')->nullable();
            $table->string('obs_bordes_oi')->nullable();
            $table->string('maculas_fo_oi')->nullable();
            $table->string('obs_maculas_fo_oi')->nullable();
            $table->string('vasos_fo_oi')->nullable();
            $table->string('obs_vasos_fo_oi')->nullable();
            $table->string('periferia_fo_oi')->nullable();
            $table->string('obs_periferia_fo_oi')->nullable();
            $table->string('campo_fo_otros_oi')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro2')->nullable();

            $table->integer('estado')->default(1)->nullable();

            $table->timestamps();
        });
        Schema::create('ficha_oft_fondo_ojo_tipo', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_profesional');
            $table->string('nombre');
            $table->string('descripcion')->nullable();

            $table->string('papilas_fo_od')->nullable();
            $table->string('obs_papilas_fo_od')->nullable();
            $table->string('excavacion_fo_od')->nullable();
            $table->string('obs_excavacion_fo_od')->nullable();
            $table->string('bordes_od')->nullable();
            $table->string('obs_bordes_od')->nullable();
            $table->string('maculas_fo_od')->nullable();
            $table->string('obs_maculas_fo_od')->nullable();
            $table->string('vasos_fo_od')->nullable();
            $table->string('obs_vasos_fo_od')->nullable();
            $table->string('periferia_fo_od')->nullable();
            $table->string('obs_periferia_fo_od')->nullable();
            $table->string('campo_fo_otros_od')->nullable();
            $table->string('papilas_fo_oi')->nullable();
            $table->string('obs_papilas_fo_oi')->nullable();
            $table->string('excavacion_fo_oi')->nullable();
            $table->string('obs_excavacion_fo_oi')->nullable();
            $table->string('bordes_oi')->nullable();
            $table->string('obs_bordes_oi')->nullable();
            $table->string('maculas_fo_oi')->nullable();
            $table->string('obs_maculas_fo_oi')->nullable();
            $table->string('vasos_fo_oi')->nullable();
            $table->string('obs_vasos_fo_oi')->nullable();
            $table->string('periferia_fo_oi')->nullable();
            $table->string('obs_periferia_fo_oi')->nullable();
            $table->string('campo_fo_otros_oi')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro2')->nullable();

            $table->integer('estado')->default(1)->nullable();

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
        Schema::dropIfExists('ficha_oft');
        Schema::dropIfExists('ficha_oft_tipo');
        Schema::dropIfExists('ficha_oft_biomicroscopia');
        Schema::dropIfExists('ficha_oft_biomicroscopia_tipo');
        Schema::dropIfExists('ficha_oft_fondo_ojo');
        Schema::dropIfExists('ficha_oft_fondo_ojo_tipo');
    }
}
