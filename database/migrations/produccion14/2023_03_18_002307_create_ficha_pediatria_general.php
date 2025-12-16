<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaPediatriaGeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_pediatria_general', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_responsable')->nullable();
            $table->string('descripcion_consulta')->nullable();
            $table->string('antec_especialidad_ped')->nullable();
            $table->string('obs_gral_crec_desarr')->nullable();
            $table->string('descripcion_ficha_tipo_especialidad')->nullable();
            $table->integer('e_nutricional')->nullable();
            $table->string('obs_e_nutricional')->nullable();
            $table->integer('e_vacunas')->nullable();
            $table->string('obs_e_vacunas')->nullable();
            $table->string('obs_ex_nutricional_vacunas')->nullable();
            $table->integer('e_piel')->nullable();
            $table->string('obs_e_piel')->nullable();
            $table->integer('e_cabcuello')->nullable();
            $table->string('obs_e_cabcuello')->nullable();
            $table->integer('e_torax')->nullable();
            $table->string('obs_e_torax')->nullable();
            $table->integer('e_abdomen')->nullable();
            $table->string('obs_e_abdomen')->nullable();
            $table->integer('e_muscesq')->nullable();
            $table->string('obs_e_muscesq')->nullable();
            $table->integer('e_o_sent')->nullable();
            $table->string('obs_e_o_sent')->nullable();
            $table->string('obs_ex_segmentario')->nullable();
            $table->string('obs_ex_pedgen')->nullable();
            $table->string('hip_diag_spec')->nullable();
            $table->string('indicacion')->nullable();
            $table->string('otro')->nullable();
            $table->integer('estado')->default('1')->nullable();
            $table->timestamps();
        });

        Schema::create('ficha_pediatria_general_tipo', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_profesional');
            $table->string('nombre');
            $table->string('descripcion')->nullable();

            $table->integer('e_nutricional')->nullable();
            $table->string('obs_e_nutricional')->nullable();
            $table->integer('e_vacunas')->nullable();
            $table->string('obs_e_vacunas')->nullable();
            $table->string('obs_ex_nutricional_vacunas')->nullable();
            $table->integer('e_piel')->nullable();
            $table->string('obs_e_piel')->nullable();
            $table->integer('e_cabcuello')->nullable();
            $table->string('obs_e_cabcuello')->nullable();
            $table->integer('e_torax')->nullable();
            $table->string('obs_e_torax')->nullable();
            $table->integer('e_abdomen')->nullable();
            $table->string('obs_e_abdomen')->nullable();
            $table->integer('e_muscesq')->nullable();
            $table->string('obs_e_muscesq')->nullable();
            $table->integer('e_o_sent')->nullable();
            $table->string('obs_e_o_sent')->nullable();
            $table->string('obs_ex_segmentario')->nullable();
            $table->string('obs_ex_pedgen')->nullable();

            $table->string('otro')->nullable();
            $table->integer('estado')->default('1')->nullable();
            $table->timestamps();
        });


        Schema::create('ficha_pediatria_general_tunner', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');

            $table->string('sexo')->nullable();
            $table->string('tanner')->nullable();
            $table->string('edad_biologica')->nullable();
            $table->string('edad_cronologica')->nullable();
            $table->string('comentario')->nullable();
            $table->dateTime('fecha')->nullable();

            $table->string('otro')->nullable();
            $table->integer('estado')->default('1')->nullable();
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
        Schema::dropIfExists('ficha_pediatria_general');
        Schema::dropIfExists('ficha_pediatria_general_tipo');
        Schema::dropIfExists('ficha_pediatria_general_tunner');
    }
}
