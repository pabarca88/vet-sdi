<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormularioFaltanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulario_faltante', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_prof_sol_form');
            $table->dateTime('prof_sol_form_fecha');
            $table->string('form_faltante');
            $table->string('form_faltante_especialidad');
            $table->string('obs_sol_form_formulario')->nullable();
            $table->integer('estado')->nullable()->default(1);
            $table->string('otro')->nullable();
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
        Schema::dropIfExists('formulario_faltante');
    }
}
