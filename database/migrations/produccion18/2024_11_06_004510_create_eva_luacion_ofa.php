<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaLuacionOfa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluacion_ofa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('id_ficha_fono')->nullable();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->integer('est_osea')->nullable();// - select-one
            $table->string('est_osea_obs')->nullable();// - textarea
            $table->integer('form_fac')->nullable();// - select-one
            $table->string('form_fac_obs')->nullable();// - textarea
            $table->integer('ap_bucal')->nullable();// - select-one
            $table->string('ap_bucal_obs')->nullable();// - textarea
            $table->integer('dientes')->nullable();// - select-one
            $table->string('dientes_obs')->nullable();// - textarea
            $table->integer('mordid')->nullable();// - select-one
            $table->string('mordid_obs')->nullable();// - textarea
            $table->integer('nariz')->nullable();// - select-one
            $table->string('nariz_obs')->nullable();// - textarea
            $table->string('cara_obs')->nullable();// - textarea
            $table->integer('vestib')->nullable();// - select-one
            $table->string('vestib_obs')->nullable();// - textarea
            $table->integer('fren_sup')->nullable();// - select-one
            $table->string('fren_sup_obs')->nullable();// - textarea
            $table->integer('fren_inf')->nullable();// - select-one
            $table->string('fren_inf_obs')->nullable();// - textarea
            $table->integer('fren_subl')->nullable();// - select-one
            $table->string('fren_subl_obs')->nullable();// - textarea
            $table->integer('palad_duro')->nullable();// - select-one
            $table->string('palad_duro_obs')->nullable();// - textarea
            $table->integer('palad_bl')->nullable();// - select-one
            $table->string('palad_bl_obs')->nullable();// - textarea
            $table->integer('cierre_vf')->nullable();// - select-one
            $table->string('cierre_vf_obs')->nullable();// - textarea
            $table->integer('uvul')->nullable();// - select-one
            $table->string('uvul_obs')->nullable();// - textarea
            $table->integer('amigd')->nullable();// - select-one
            $table->string('amigd_obs')->nullable();// - textarea
            $table->integer('adenoi')->nullable();// - select-one
            $table->string('adenoi_obs')->nullable();// - textarea
            $table->string('obs_gral_boc')->nullable();// - textarea
            $table->integer('forma')->nullable();// - select-one
            $table->string('forma_obs')->nullable();// - textarea
            $table->integer('posicion')->nullable();// - select-one
            $table->string('posicion_obs')->nullable();// - textarea
            $table->integer('tono')->nullable();// - select-one
            $table->string('tono_obs')->nullable();// - textarea
            $table->integer('cicatriz')->nullable();// - select-one
            $table->string('cicatriz_obs')->nullable();// - textarea
            $table->integer('tam')->nullable();// - select-one
            $table->string('tam_obs')->nullable();// - textarea
            $table->integer('funcion')->nullable();// - select-one
            $table->string('funcion_obs')->nullable();// - textarea
            $table->string('leng_obs')->nullable();// - textarea
            $table->integer('formalab')->nullable();// - select-one
            $table->string('formalab_obs')->nullable();// - textarea
            $table->integer('tonolab')->nullable();// - select-one
            $table->string('tonolab_obs')->nullable();// - textarea
            $table->integer('cicatriz_lab')->nullable();// - select-one
            $table->string('cicatriz_lab_obs')->nullable();// - textarea
            $table->integer('posicion_lab')->nullable();// - select-one
            $table->string('posicion_lab_obs')->nullable();// - textarea
            $table->integer('tamano_lab')->nullable();// - select-one
            $table->string('tamano_lab_obs')->nullable();// - textarea
            $table->integer('funcionalidad')->nullable();// - select-one
            $table->string('funcionalidad_obs')->nullable();// - textarea
            $table->string('obs_lab_sup')->nullable();// - textarea
            $table->integer('formalabi')->nullable();// - select-one
            $table->string('formalabi_obs')->nullable();// - textarea
            $table->integer('tonolabi')->nullable();// - select-one
            $table->string('tonolabi_obs')->nullable();// - textarea
            $table->integer('cicatrizi_lab')->nullable();// - select-one
            $table->string('cicatrizi_lab_obs')->nullable();// - textarea
            $table->integer('posicioni_lab')->nullable();// - select-one
            $table->string('posicioni_lab_obs')->nullable();// - textarea
            $table->integer('tamanoi_lab')->nullable();// - select-one
            $table->string('tamanoi_lab_obs')->nullable();// - textarea
            $table->integer('funcionalidadi')->nullable();// - select-one
            $table->string('funcionalidadi_obs')->nullable();// - textarea
            $table->string('obs_lab_supi')->nullable();// - textarea
            $table->string('otro')->nullable();
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
        Schema::dropIfExists('eva_luacion_ofa');
    }
}
