<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->id();
            $table->boolean('enfermedad_comun_maternal')->default(false);
            $table->boolean('laboral')->default(false);

            $table->string('nombre_empleador');
            $table->string('rut_empleador',12);

            $table->date('reposo_inicio');
            $table->date('reposo_fin');
            $table->string('tipo_reposo');
            $table->string('lugar_reposo');
            $table->string('direccion_reposo')->nullable();
            $table->string('region_reposo')->nullable();

            $table->string('tipo_licencia');
            $table->boolean('recuperabilidad_laboral')->default(false);
            $table->boolean('tramite_invalidez')->default(false);

            $table->string('diagnostico_c10');
            $table->string('diagnostico');

            $table->string('antecedentes');

            $table->string('examen_apoyo')->nullable();

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
        Schema::dropIfExists('licencias');
    }
}
