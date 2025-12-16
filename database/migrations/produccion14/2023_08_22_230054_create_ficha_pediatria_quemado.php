<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaPediatriaQuemado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_pediatria_quemado', function (Blueprint $table) {

            $table->id();

            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_ficha_pediatria')->nullable();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_responsable')->nullable();
            $table->bigInteger('id_profesional');

            $table->integer('sintoma_cons_ped_quem')->nullable();
            $table->string('obs_sintoma_cons_quem')->nullable();
            $table->string('motivo_ped_quem')->nullable();
            $table->string('antec_especialidad_ped_quem')->nullable();
            $table->string('antec_especialidad_gen_quem')->nullable();

            $table->integer('e_etiologia')->nullable();
            $table->string('obs_e_etiologia')->nullable();
            $table->integer('e_zona_esp')->nullable();
            $table->string('obs_e_zona_esp')->nullable();
            $table->integer('e_zona_neutra')->nullable();
            $table->string('obs_e_zona_neutra')->nullable();
            $table->integer('e_prof_quem')->nullable();
            $table->string('sup_quem')->nullable();
            $table->string('ind_gravedad_garces')->nullable();
            $table->string('obs_ex_segmentario')->nullable();


            $table->integer('urgencia_quem_ped')->nullable();
            $table->string('obs_urgencia_quem_ped')->nullable();
            $table->integer('hosp_quem_ped')->nullable();
            $table->string('obs_hosp_quem_ped')->nullable();
            $table->integer('otrotto_quem_ped')->nullable();
            $table->string('obs_otrotto_quem_ped')->nullable();
            $table->string('obs_plan_quem')->nullable();

            $table->integer('hospen')->nullable();
            $table->string('obs_hospen')->nullable();
            $table->string('nom_inst')->nullable();
            $table->integer('hosp_enserv')->nullable();
            $table->string('obs_hosp_enserv')->nullable();
            $table->integer('motivo_hosp')->nullable();
            $table->string('obs_motivo_hosp')->nullable();
            $table->string('obs_hospitalizar')->nullable();

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
        Schema::dropIfExists('ficha_pediatria_quemado');
    }
}
