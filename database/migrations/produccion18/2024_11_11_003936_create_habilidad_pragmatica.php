<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabilidadPragmatica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilidad_pragmatica', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_ficha_otros_prof');
            $table->bigInteger('id_ficha_fono')->nullable();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');

            $table->integer('cinetica')->nullable();// - select-one
            $table->integer('proxemica')->nullable();// - select-one
            $table->integer('intencion')->nullable();// - select-one
            $table->integer('cont_visual')->nullable();// - select-one
            $table->integer('expr_facial')->nullable();// - select-one
            $table->integer('facult_conversacion')->nullable();// - select-one
            $table->integer('vari_estilisticas')->nullable();// - select-one
            $table->integer('alter_reciproca')->nullable();// - select-one
            $table->integer('tematizacion')->nullable();// - select-one
            $table->integer('peticiones')->nullable();// - select-one
            $table->integer('aclara_repara')->nullable();// - select-one
            $table->string('obs_generales')->nullable();// - textarea

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
        Schema::dropIfExists('habilidad_pragmatica');
    }
}
