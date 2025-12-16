<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalibracionesAudifonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calibraciones_audifono', function (Blueprint $table) {
            $table->id();

            // Campos de relación
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
            $table->unsignedBigInteger('id_paciente')->nullable();
            $table->unsignedBigInteger('id_profesional')->nullable();

            // Campos del formulario según la imagen
            $table->string('motivo_control')->nullable()->comment('Motivo del control');
            $table->string('estado_audifono')->nullable()->comment('Estado del audífono');
            $table->string('marca')->nullable()->comment('Marca del audífono');
            $table->string('modelo')->nullable()->comment('Modelo del audífono');
            $table->string('numero_serie')->nullable()->comment('Número de serie');
            $table->date('fecha_entrega')->nullable()->comment('Fecha de entrega');
            $table->text('acciones_calibrado')->nullable()->comment('Acciones de calibrado realizadas');
            $table->text('opinion_paciente')->nullable()->comment('Opinión del paciente');

            // Campo de estado general
            $table->tinyInteger('estado')->default(1)->comment('1=Activo, 0=Inactivo');

            $table->timestamps();

            // Índices para mejorar performance
            $table->index('id_producto');
            $table->index('id_lugar_atencion');
            $table->index('id_paciente');
            $table->index('id_profesional');
            $table->index('estado');
            $table->index('fecha_entrega');

            // Claves foráneas (comentadas por si las tablas no existen aún)
            // $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            // $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
            // $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            // $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calibraciones_audifono');
    }
}
