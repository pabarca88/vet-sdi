<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedenteEnfermedadesCronicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedente_enfermedades_cronicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_antecedentes');
            $table->unsignedBigInteger('id_enfermedad_cronica')->nullable();
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->string('nombre_patologia_cronica');

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
        Schema::dropIfExists('antecedente_enfermedades_cronicas');
    }
}