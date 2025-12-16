<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GinemodalMamasExamen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('gine_modal_mamas_examen', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_gineco_obstetrica');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_ficha_gine');
            $table->date('fecha')->nullable();
            $table->string('lado_1')->nullable();
            $table->string('des_ex_mamas_1')->nullable();
            $table->string('lado_2')->nullable();
            $table->string('des_ex_mamas_2')->nullable();
            $table->string('des_ex_mamasgen')->nullable();
            $table->integer('sol_ex_lado')->nullable();
            $table->integer('sol_ex_tipo')->nullable();
            $table->integer('enf_cuadrante')->nullable();
            $table->integer('sosp_dg')->nullable();
            $table->string('sol_ex_mamas_esp')->nullable();
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
        Schema::dropIfExists('gine_modal_mamas_examen');
    }
}
