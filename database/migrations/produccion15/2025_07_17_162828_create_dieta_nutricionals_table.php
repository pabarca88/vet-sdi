<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietaNutricionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dieta_nutricionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');
            $table->string('dieta_para');
            $table->text('desayuno');
            $table->text('merienda');
            $table->text('almuerzo');
            $table->text('media_tarde');
            $table->text('cena');
            $table->text('alimentos_prohibidos');
            $table->text('sustitucion');
            $table->text('recomendaciones');
            $table->timestamps();

            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dieta_nutricionals');
    }
}
