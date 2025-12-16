<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeDietaNutricionalsFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dieta_nutricionals', function (Blueprint $table) {
            $table->unsignedBigInteger('id_paciente')->nullable()->change();
            $table->unsignedBigInteger('id_profesional')->nullable()->change();
            $table->string('dieta_para')->nullable()->change();
            $table->text('desayuno')->nullable()->change();
            $table->text('merienda')->nullable()->change();
            $table->text('almuerzo')->nullable()->change();
            $table->text('media_tarde')->nullable()->change();
            $table->text('cena')->nullable()->change();
            $table->text('alimentos_prohibidos')->nullable()->change();
            $table->text('sustitucion')->nullable()->change();
            $table->text('recomendaciones')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dieta_nutricionals', function (Blueprint $table) {
            $table->unsignedBigInteger('id_paciente')->nullable(false)->change();
            $table->unsignedBigInteger('id_profesional')->nullable(false)->change();
            $table->string('dieta_para')->nullable(false)->change();
            $table->text('desayuno')->nullable(false)->change();
            $table->text('merienda')->nullable(false)->change();
            $table->text('almuerzo')->nullable(false)->change();
            $table->text('media_tarde')->nullable(false)->change();
            $table->text('cena')->nullable(false)->change();
            $table->text('alimentos_prohibidos')->nullable(false)->change();
            $table->text('sustitucion')->nullable(false)->change();
            $table->text('recomendaciones')->nullable(false)->change();
        });
    }
}
