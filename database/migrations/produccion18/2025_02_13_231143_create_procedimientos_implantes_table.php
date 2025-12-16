<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientosImplantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimientos_implantes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_paciente');
            $table->integer('id_profesional');
            $table->integer('id_ficha_atencion');
            $table->integer('id_especialidad');
            $table->double('numero_pieza');
            $table->date('fecha');
            $table->integer('id_tipo_procedimiento');
            $table->string('tipo_procedimiento');
            $table->integer('id_tipo_anestesia');
            $table->string('anestesia');
            $table->integer('numero_tubos');
            $table->integer('id_tecnica_anestesia');
            $table->string('tecnica_anestesia');
            $table->integer('id_anestesico');
            $table->string('anestesico');
            $table->integer('id_incidentes');
            $table->string('incidentes');
            $table->integer('id_mat_injerto_oseo');
            $table->string('material_injerto_oseo');

            $table->string('metodo_injerto_oseo');
            $table->integer('id_suturas');
            $table->string('suturas');
            $table->integer('tiempo_quirurgico');
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('procedimientos_implantes');
    }
}
