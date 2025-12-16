<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GinemodalCicloMenstrual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('gine_modal_ciclo_menstrual', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_gineco_obstetrica');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_ficha_gine');
            $table->date('fecha_actual')->nullable();
            $table->string('edad_menarquia')->nullable();
            $table->string('gr_tunner')->nullable();
            $table->date('fecha_comienzo')->nullable();
            $table->string('comentarios_menarquia')->nullable();
            $table->date('fur')->nullable();
            $table->string('tipo_ciclo')->nullable();
            $table->string('frecuencia_ciclo')->nullable();
            $table->string('sintomas_ciclo')->nullable();
            $table->string('comentarios_ciclo')->nullable();
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
         Schema::dropIfExists('gine_modal_ciclo_menstrual');
    }
}
