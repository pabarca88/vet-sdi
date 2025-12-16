<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTratamientoTerapiaSicologica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_tratamiento_terapia_sicologica', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');

            $table->integer('terapia')->nullable();
            $table->string('psi_vidadiaria')->nullable();
            $table->string('psi_ant_cond')->nullable();
            $table->string('psi_laboral')->nullable();
            $table->string('psi_autoestima')->nullable();
            $table->string('obs_ind_terapia_psi')->nullable();

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
        Schema::dropIfExists('plan_tratamiento_terapia_sicologica');
    }
}
