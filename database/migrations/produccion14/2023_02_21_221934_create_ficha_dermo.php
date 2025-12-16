<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaDermo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_dermo', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');

            $table->string('descripcion_consulta_dermato');
            $table->string('antec_especialidad_dermato')->nullable();
            $table->string('img_cons_dermato_pre')->nullable();
            $table->string('img_cons_dermato_post')->nullable();
            $table->string('biopsia_dermat')->nullable();
            $table->string('obs_result_biopsia')->nullable();
            $table->string('elim_cicat')->nullable();
            $table->string('desc_elim_cicat')->nullable();
            $table->string('obs_elim_cica')->nullable();
            $table->integer('imagenes_elim_cicat_pre')->nullable();
            $table->integer('imagenes_elim_cicat_post')->nullable();

            $table->string('proc_piel_danada')->nullable();
            $table->string('proc_piel_danada_desc')->nullable();
            $table->string('proc_piel_danada_obs')->nullable();
            $table->string('proc_piel_danada_img_pre')->nullable();
            $table->string('proc_piel_danada_img_post')->nullable();
            $table->string('exfoliacion_proc')->nullable();
            $table->string('exfoliacion_comp')->nullable();
            $table->string('exfoliacion_desc')->nullable();
            $table->string('exfoliacion_obs')->nullable();
            $table->integer('imagenes_exfoliacion_pre')->nullable();
            $table->integer('imagenes_exfoliacion_post')->nullable();

            $table->string('dermabras_proc')->nullable();
            $table->string('dermabras_desc')->nullable();
            $table->string('dermabras_obs')->nullable();
            $table->integer('imagenes_dermabras_pre')->nullable();
            $table->integer('imagenes_dermabras_post')->nullable();
            $table->string('laser_motivo')->nullable();
            $table->string('laser_desc')->nullable();
            $table->string('laser_obs')->nullable();
            $table->integer('imagenes_laser_pre')->nullable();
            $table->integer('imagenes_laser_post')->nullable();

            $table->string('nombre_otro_proced')->nullable();
            $table->string('desc_otro_proced')->nullable();
            $table->string('obs_otro_proced')->nullable();

            $table->integer('estado')->default(1)->nullable();
            $table->timestamps();
        });

        Schema::create('ficha_dermo_img', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_ficha_dermo');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');

            $table->string('tipo');
            $table->string('url');
            $table->string('nombre');

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
        Schema::dropIfExists('ficha_dermo');
    }
}
