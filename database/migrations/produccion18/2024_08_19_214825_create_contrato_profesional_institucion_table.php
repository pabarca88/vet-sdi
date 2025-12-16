<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoProfesionalInstitucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_profesional_institucion', function (Blueprint $table) {
            $table->id();
            $table->string('rut');
            $table->date('fecha_ingreso');
            $table->string('nombre');
            $table->string('primer_apellido');
            $table->string('segundo_apellido');
            $table->string('email');
            $table->string('telefono');
            $table->string('telefono_dos');
            $table->string('direccion');
            $table->integer('id_region');
            $table->integer('id_comuna');
            $table->integer('id_profesion');
            $table->integer('id_especialidad');
            $table->integer('id_sub_tipo_especialidad');
            $table->string('dias_atencion');
            $table->string('horario_atencion');
            $table->integer('pacientes_hora');
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
        Schema::dropIfExists('contrato_profesional_institucion');
    }
}
