<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOctavoPar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('octavo_par', function (Blueprint $table) {
            $table->id();
            $table->integer('id_examen');
            $table->integer('id_lugar_atencion');
            $table->integer('id_institucion');
            $table->string('token', 100);
            $table->integer('id_profesional')->nullable();
            $table->integer('id_paciente')->nullable();
            $table->integer('fecha_ex')->nullable();
            $table->string('profesional')->nullable();
            $table->string('derivado_por')->nullable();
            $table->string('Nombre_pcte')->nullable();
            $table->integer('edad')->nullable();
            $table->string('rut')->nullable();
            $table->string('direccion')->nullable();
            $table->string('email')->nullable();
            $table->string('ant_especialidad')->nullable();
            $table->string('romberg')->nullable();
            $table->string('romberg_sens')->nullable();
            $table->string('marcha_ojo_ab')->nullable();
            $table->string('babinsky')->nullable();
            $table->string('romberg_barre')->nullable();
            $table->string('untenberg_fak')->nullable();
            $table->string('indicacion')->nullable();
            $table->string('temblor')->nullable();
            $table->string('dismetria')->nullable();
            $table->string('discinergia')->nullable();
            $table->string('disdiadoco')->nullable();
            $table->string('hipotonia')->nullable();
            $table->string('otras_pruebas')->nullable();
            $table->string('observaciones_equilibrio')->nullable();
            $table->string('ng_1')->nullable();
            $table->string('ng_2')->nullable();
            $table->string('ng_3')->nullable();
            $table->string('ng_4')->nullable();
            $table->string('ng_5')->nullable();
            $table->string('ng_6')->nullable();
            $table->string('ng_7')->nullable();
            $table->string('ng_8')->nullable();
            $table->string('ng_9')->nullable();
            $table->string('ng_10')->nullable();
            $table->string('mov_oculares')->nullable();
            $table->string('dismetria_ocular')->nullable();
            $table->string('obs_comentarios')->nullable();
            $table->longText('ex_ng_provocado')->nullable();
            $table->longText('ex_p_calorica')->nullable();
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
        Schema::dropIfExists('octavo_par');
    }
}
