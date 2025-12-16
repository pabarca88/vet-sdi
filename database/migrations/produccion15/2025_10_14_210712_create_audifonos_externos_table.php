<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudifonosExternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audifonos_externos', function (Blueprint $table) {
            $table->id();

            // Relación con paciente
            $table->unsignedBigInteger('id_paciente');

            // Información de procedencia
            $table->string('procedencia_laboratorio', 255)->comment('Nombre del laboratorio o proveedor externo');
            $table->date('fecha_adquisicion')->comment('Fecha en que el paciente adquirió el audífono');

            // Audífono izquierdo
            $table->string('n_serie_izquierdo', 100)->nullable()->comment('Número de serie del audífono izquierdo');
            $table->string('marca_izquierdo', 100)->comment('Marca del audífono izquierdo');
            $table->string('modelo_izquierdo', 100)->comment('Modelo específico del audífono izquierdo');
            $table->enum('tipo_izquierdo', ['BTE', 'ITE', 'ITC', 'CIC', 'RIC'])->nullable()->comment('Tipo de audífono izquierdo (Retroauricular, Intracanal, etc.)');

            // Audífono derecho
            $table->string('n_serie_derecho', 100)->nullable()->comment('Número de serie del audífono derecho');
            $table->string('marca_derecho', 100)->comment('Marca del audífono derecho');
            $table->string('modelo_derecho', 100)->comment('Modelo específico del audífono derecho');
            $table->enum('tipo_derecho', ['BTE', 'ITE', 'ITC', 'CIC', 'RIC'])->nullable()->comment('Tipo de audífono derecho (Retroauricular, Intracanal, etc.)');

            // Información adicional del control
            $table->enum('estado_audifono', ['Excelente', 'Bueno', 'Regular', 'Malo', 'Requiere reparación'])->default('Bueno')->comment('Estado físico del audífono');
            $table->enum('motivo_control', [
                'Control rutinario',
                'Calibración',
                'Reparación',
                'Ajuste',
                'Limpieza',
                'Cambio de accesorios',
                'Otro'
            ])->nullable()->comment('Razón del control');
            $table->text('observaciones')->nullable()->comment('Observaciones del control');

            // Datos del control (capturados automáticamente del formulario)
            $table->date('fecha_control')->nullable()->comment('Fecha del control actual');
            $table->string('examinador', 255)->nullable()->comment('Profesional que realizó el control');
            $table->text('examen_cae')->nullable()->comment('Examen del conducto auditivo externo');

            // Timestamps y soft deletes
            $table->timestamps();
            $table->softDeletes();

            // Índices para mejorar el rendimiento de las consultas
            $table->index('id_paciente', 'idx_audifonos_externos_paciente');
            $table->index('procedencia_laboratorio', 'idx_audifonos_externos_laboratorio');
            $table->index('fecha_adquisicion', 'idx_audifonos_externos_fecha_adq');
            $table->index('fecha_control', 'idx_audifonos_externos_fecha_ctrl');
            $table->index(['id_paciente', 'fecha_control'], 'idx_audifonos_externos_paciente_fecha');

            // Foreign key (descomentarla si existe la tabla pacientes con id)
            // $table->foreign('id_paciente', 'fk_audifonos_externos_paciente')
            //       ->references('id')
            //       ->on('pacientes')
            //       ->onDelete('cascade')
            //       ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audifonos_externos');
    }
}
