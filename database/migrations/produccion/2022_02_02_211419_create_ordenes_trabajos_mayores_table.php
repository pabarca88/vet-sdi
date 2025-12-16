<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTrabajosMayoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_trabajos_mayores', function (Blueprint $table) {
            $table->id();

            $table->string('nro_orden');
            $table->string('clinica_doctor');
            $table->string('rut_profesional')->nullable();
            $table->string('guia');
            $table->string('color');
            $table->string('urgencia');
            $table->string('material');
            $table->string('trabajo_realizar');
            $table->string('comentarios')->nullable();
            $table->string('marca_implante')->nullable();
            $table->string('medida_implante')->nullable();
            $table->string('nro_replicas')->nullable();
            $table->string('nro_tornillos')->nullable();
            $table->string('otros')->nullable();
            $table->string('cubetas')->nullable();
            $table->string('p_articulacion')->nullable();
            $table->string('p_dientes')->nullable();
            $table->string('p_metal')->nullable();
            $table->string('bizcocho')->nullable();
            $table->string('terminacion')->nullable();
            $table->string('compostura')->nullable();

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
        Schema::dropIfExists('ordenes_trabajos_mayores');
    }
}