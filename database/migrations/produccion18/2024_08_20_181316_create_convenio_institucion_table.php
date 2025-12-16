<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvenioInstitucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenio_institucion', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tipo_convenio_institucion');
            $table->string('nombre_convenio_institucion');
            $table->integer('porcentaje_convenio_institucion');
            $table->integer('id_tipo_convenio');
            $table->date('fecha_inicio_convenio_institucion');
            $table->date('fecha_fin_convenio_institucion');
            $table->string('rut_representante_convenio_institucion');
            $table->string('nombre_representante_convenio_institucion');
            $table->string('telefono_representante_convenio_institucion');
            $table->string('email_representante_convenio_institucion');
            $table->string('direccion_representante_convenio_institucion');
            $table->string('observaciones_convenio_institucion');
            $table->json('productos_convenio_institucion');
            $table->integer('id_institucion');
            $table->string('otros');
            $table->integer('estado');
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
        Schema::dropIfExists('convenio_institucion');
    }
}
