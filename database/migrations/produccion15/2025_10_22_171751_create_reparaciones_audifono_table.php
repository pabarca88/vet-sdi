<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparacionesAudifonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparaciones_audifono', function (Blueprint $table) {
            $table->id();

            // Campos de relación
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
            $table->unsignedBigInteger('id_paciente')->nullable();
            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->unsignedBigInteger('id_hora_medica')->nullable();

            // Campos del formulario de reparación
            $table->string('motivo_reparacion')->nullable()->comment('Motivo de la reparación');
            $table->string('estado_audifono')->nullable()->comment('Estado del audífono antes de reparar');
            $table->string('marca')->nullable()->comment('Marca del audífono');
            $table->string('modelo')->nullable()->comment('Modelo del audífono');
            $table->string('numero_serie')->nullable()->comment('Número de serie');
            $table->date('fecha_recepcion')->nullable()->comment('Fecha de recepción para reparación');
            $table->date('fecha_entrega')->nullable()->comment('Fecha estimada de entrega');
            $table->text('acciones_reparacion')->nullable()->comment('Acciones de reparación realizadas');
            $table->text('diagnostico_tecnico')->nullable()->comment('Diagnóstico técnico del problema');
            $table->text('opinion_paciente')->nullable()->comment('Opinión del paciente');
            $table->decimal('costo_reparacion', 10, 2)->nullable()->comment('Costo de la reparación');
            $table->string('estado_reparacion')->default('recibido')->comment('Estado: recibido, en_proceso, completado, entregado, cancelado');

            // Campo de estado general
            $table->tinyInteger('estado')->default(1)->comment('1=Activo, 0=Inactivo');

            $table->timestamps();

            // Índices para mejorar performance
            $table->index('id_producto');
            $table->index('id_lugar_atencion');
            $table->index('id_paciente');
            $table->index('id_profesional');
            $table->index('id_hora_medica');
            $table->index('estado');
            $table->index('estado_reparacion');
            $table->index('fecha_recepcion');
            $table->index('fecha_entrega');

            // Claves foráneas (comentadas por si las tablas no existen aún)
            // $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            // $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
            // $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            // $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            // $table->foreign('id_hora_medica')->references('id')->on('horas_medicas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparaciones_audifono');
    }
}
