<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaFonoHablaLenguaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_fono_habla_lenguaje', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion_otros');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('ex_resp')->nullable();
            $table->string('ex_resp_obs')->nullable();
            $table->integer('ex_fonac')->nullable();
            $table->string('ex_fonac_obs')->nullable();
            $table->integer('ex_art_pal')->nullable();
            $table->string('ex_art_pal_obs')->nullable();
            $table->integer('ex_prosodia')->nullable();
            $table->string('ex_prosodia_obs')->nullable();
            $table->string('habla_obs')->nullable();
            $table->integer('res_tp')->nullable();
            $table->string('res_tp_obs')->nullable();
            $table->integer('res_mod')->nullable();
            $table->string('res_mod_obs')->nullable();
            $table->integer('res_cfr')->nullable();
            $table->string('res_cfr_obs')->nullable();
            $table->integer('alt_esp_leng')->nullable();
            $table->string('alt_esp_leng_obs')->nullable();
            $table->string('g_leng_obs')->nullable();
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
         Schema::dropIfExists('ficha_fono_habla_lenguaje');
    }
}
