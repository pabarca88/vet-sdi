<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoDependienteProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_dependiente_profesional', function (Blueprint $table) {
            $table->id();
            $table->integer('id_especialidad');
            $table->integer('id_tipo_especialidad')->nullable();
            $table->integer('id_subtipo_especialidad')->nullable();
            $table->integer('id_profesional');
            $table->string('rut')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellido_uno')->nullable();
            $table->string('apellido_dos')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->integer('id_institucion');
            $table->integer('id_lugar_atencion');
            $table->integer('tipo_contrato');
            $table->date('fecha_inicio');
            $table->date('fecha_termino')->nullable();
            $table->double('monto_imponible');
            $table->integer('locomocion')->nullable();
            $table->double('locomocion_porcentaje')->nullable();
            $table->integer('colacion')->nullable();
            $table->double('colacion_porcentaje')->nullable();
            $table->integer('asignacion_familiar')->nullable();
            $table->double('asignacion_familiar_cantidad')->nullable();
            $table->integer('caja_compensacion')->nullable();
            $table->double('caja_compensacion_porcentaje')->nullable();;
            $table->string('otro')->nullable();
            $table->string('dias_laborales');
            $table->time('hora_ingreso');
            $table->time('hora_salida');
            $table->date('fecha_creacion')->nullable();
            $table->integer('id_admin_creador')->nullable();
            $table->integer('id_tipo_admin_creador')->nullable();
            $table->longText('text_contrato')->nullable();
            $table->string('pdf_base')->nullable();
            $table->integer('estado_firmado')->nullable();
            $table->string('pdf_firmado')->nullable();
            $table->integer('estado_inspeccion_trabajo')->nullable();
            $table->string('otro_2')->nullable();
            $table->integer('estado')->nullable();
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
        Schema::dropIfExists('contrato_dependiente_profesional');
    }
}
