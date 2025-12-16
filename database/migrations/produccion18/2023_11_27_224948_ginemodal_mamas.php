<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GinemodalMamas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gine_modal_mamas_antec', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_gineco_obstetrica');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_ficha_gine');
            $table->date('fecha')->nullable();
            $table->string('tipo_examen')->nullable();
            $table->string('resultado')->nullable();
            $table->string('indic')->nullable();
            $table->string('tto_complicaciones')->nullable();
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
        Schema::dropIfExists('gine_modal_mamas_antec');
    }
}
