<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoMantencionInstitucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_mantencion_institucion', function (Blueprint $table) {
            $table->id();
            $table->string('rut');
            $table->date('fecha_ingreso');
            $table->string('nombre');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('email');
            $table->string('telefono');
            $table->integer('id_region');
            $table->integer('id_comuna');
            $table->string('direccion');
            $table->integer('numero');
            $table->string('id_tipo_mantencion');
            $table->string('id_cargo');
            $table->integer('horas_trabajadas');
            $table->double('remuneracion')->nullable();
            $table->integer('id_funcion');
            $table->integer('id_banco');
            $table->string('numero_cuenta');
            $table->string('sucursal');
            $table->integer('id_institucion');
            $table->integer('id_tipo_contrato');
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
        Schema::dropIfExists('contrato_mantencion_institucion');
    }
}
