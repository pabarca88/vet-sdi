<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialesInsumosPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales_insumos_pacientes', function (Blueprint $table) {
            $table->id();

            $table->string('codigo_trabajo');
            $table->string('material')->nullable();
            $table->string('cantidad_material')->nullable();
            $table->string('insumo')->nullable();
            $table->string('cantidad_insumo')->nullable();
            $table->string('instrumental')->nullable();
            $table->string('cantidad_instrumental')->nullable();
            $table->string('instrumental_desechable')->nullable();
            $table->string('cantidad_instrumental_desechable')->nullable();
            $table->string('nro_box');
            $table->time('hora_inicio');
            $table->time('hora_termino');

            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();

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
        Schema::dropIfExists('materiales_insumos_pacientes');
    }
}