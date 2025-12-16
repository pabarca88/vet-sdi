<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaSicologia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_sicologia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('presentacion')->nullable();
            $table->string('conciencia')->nullable();
            $table->string('actitud')->nullable();
            $table->string('atencion_concentracion')->nullable();
            $table->string('afectividad')->nullable();
            $table->string('pensamiento')->nullable();
            $table->string('sensopercepcion')->nullable();
            $table->string(' psicomotricidad')->nullable();
            $table->string('sueno')->nullable();
            $table->string('higiene')->nullable();
            $table->string('alimentacion')->nullable();
            $table->integer('psi_solo_control')->nullable();
            $table->integer('psi_ter_indiv')->nullable();
            $table->integer('psi_ter_grup')->nullable();
            $table->integer('psi_sol_hosp')->nullable();
            $table->integer('obs_plan_tratamiento')->nullable();
            $table->integer('dsm_5')->nullable();
            $table->integer('dsm_5p')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
        Schema::create('ficha_sico_sicosocial', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_tipo_especialidad');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('lugar_nacimiento')->nullable();
            $table->integer('estado_civil')->nullable();
            $table->integer('niv_ed')->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('religion')->nullable();
            $table->string('vive_con')->nullable();
            $table->string('vive_obs')->nullable();
            $table->string('alcohol')->nullable();
            $table->string('tabaco')->nullable();
            $table->string('sustancias_ilicitas')->nullable();
            $table->string('sexualidad')->nullable();
            $table->string('com_generales')->nullable();
            $table->string('ant_laborales')->nullable();
            $table->string('ant_esparc')->nullable();
            $table->string('obs_generales')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('ficha_sico_biopatografia', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_tipo_especialidad');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('prenatal')->nullable();
            $table->string('natal')->nullable();
            $table->string('infancia')->nullable();
            $table->string('adolescencia')->nullable();
            $table->string('edad_adulta')->nullable();
            $table->string('ad_mayor')->nullable();
            $table->string('actualidad')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
        Schema::create('ficha_sico_hist_familiar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_tipo_especialidad');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('nombre_padre')->nullable();
            $table->string('rel_padre')->nullable();
            $table->string('nombre_madre')->nullable();
            $table->string('rel_madre')->nullable();
            $table->string('rel_entre_padres')->nullable();
            $table->string('tiene_hnos')->nullable();
            $table->string('cantidad_hnos')->nullable();
            $table->string('nombre_hno')->nullable();
            $table->string('rel_hf_hno')->nullable();
            $table->string('rel_entre_hnos')->nullable();
            $table->string('nombre_pareja')->nullable();
            $table->string('rel_pareja')->nullable();
            $table->string('rel_hf_pareja_obs')->nullable();
            $table->string('tiene_hijos')->nullable();
            $table->string('cantidad_hijos')->nullable();
            $table->string('nombre_hijo')->nullable();
            $table->string('rel_hijo')->nullable();
            $table->string('rel_entre_hijos')->nullable();
            $table->string('nombre_ot_per')->nullable();
            $table->string('rel_ot_per')->nullable();
            $table->string('rel_obs_generales')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->string('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('ficha_sico_ant_psiquiatricos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_tipo_especialidad');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('ant_medicos')->nullable();
            $table->string('ant_suicidio')->nullable();
            $table->string('enf_mentales')->nullable();
            $table->string('trat_psicologicos_prev')->nullable();
            $table->string('trat_psiquiatricos_prev')->nullable();
            $table->string('medicacion_actual')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->string('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('ficha_sico_ex_mental', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_tipo_especialidad');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('presentacion')->nullable();
            $table->string('conciencia')->nullable();
            $table->string('actitud')->nullable();
            $table->string('atencion_concentracion')->nullable();
            $table->string('afectividad')->nullable();
            $table->string('pensamiento')->nullable();
            $table->string('sensopercepcion')->nullable();
            $table->string('psicomotricidad')->nullable();
            $table->string('sueno')->nullable();
            $table->string('higiene')->nullable();
            $table->string('alimentacion')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('ficha_sico_test_rorshchach', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_tipo_especialidad');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('lam_uno_resp')->nullable();
            $table->string('lam_uno_com')->nullable();
            $table->string('lam_dos_resp')->nullable();
            $table->string('lam_dos_com')->nullable();
            $table->string('lam_tres_resp')->nullable();
            $table->string('lam_tres_com')->nullable();
            $table->string('lam_cuatro_resp')->nullable();
            $table->string('lam_cuatro_com')->nullable();
            $table->string('lam_cinco_resp')->nullable();
            $table->string('lam_cinco_com')->nullable();
            $table->string('lam_seis_resp')->nullable();
            $table->string('lam_seis_com')->nullable();
            $table->string('lam_siete_resp')->nullable();
            $table->string('lam_siete_com')->nullable();
            $table->string('lam_ocho_resp')->nullable();
            $table->string('lam_ocho_com')->nullable();
            $table->string('lam_nueve_resp')->nullable();
            $table->string('lam_nueve_com')->nullable();
            $table->string('lam_diez_resp')->nullable();
            $table->string('lam_diez_com')->nullable();
            $table->string('comentarios_gen')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('ficha_sico_otros_test', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_especialidad');
            $table->bigInteger('id_tipo_especialidad');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->string('nomb_test')->nullable();
            $table->string('resp')->nullable();
            $table->string('com')->nullable();
            $table->string('ind')->nullable();
            $table->string('comentarios_gen')->nullable();
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

        Schema::dropIfExists('ficha_sicologia');
        Schema::dropIfExists('ficha_sico_sicosocial');
        Schema::dropIfExists('ficha_sico_biopatografia');
        Schema::dropIfExists('ficha_sico_hist_familiar');
        Schema::dropIfExists('ficha_sico_ant_psiquiatricos');
        Schema::dropIfExists('ficha_sico_ex_mental');
        Schema::dropIfExists('ficha_sico_test_rorshchach');
        Schema::dropIfExists('ficha_sico_otros_test');
    }
}
