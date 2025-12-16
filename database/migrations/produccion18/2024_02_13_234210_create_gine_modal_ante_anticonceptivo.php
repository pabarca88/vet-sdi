<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGineModalAnteAnticonceptivo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gine_modal_ante_anticonceptivo', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_ficha_atencion')->nullable();
            $table->bigInteger('id_ficha_otros_prof')->nullable();
            $table->bigInteger('id_ficha_gineco_obstetrica')->nullable();

            $table->string('tipo');
            $table->date('fecha')->nullable();
            $table->string('elemento')->nullable();
            $table->string('farmaco')->nullable();
            $table->string('tiempo')->nullable();
            $table->date('fecha_instalacion')->nullable();
            $table->string('comentarios')->nullable();
            $table->string('otro')->nullable();
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
        Schema::dropIfExists('gine_modal_ante_anticonceptivo');
    }
}
