<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalInstitucionConvenio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_convenio_institucion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('observacion')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
        });

        Schema::create('profesional_institucion_convenio', function (Blueprint $table) {
            $table->id();
            $table->string('token',100);
            $table->bigInteger('id_profesional')->nullable();
            $table->bigInteger('id_institucion')->nullable();
            $table->bigInteger('id_lugar_atencion')->nullable();
            $table->bigInteger('id_tipo_convenio_institucion')->nullable();
            $table->integer('fijo')->default(0);
            $table->decimal('atencion',10,2)->default(0);
            $table->integer('confirmacion_agenda')->default(0);
            $table->integer('ggcc')->default(0);
            $table->integer('box')->default(0);
            $table->dateTime('fecha_confirmacion')->nullable();
            $table->dateTime('fecha_rechazo')->nullable();
            $table->integer('estado')->default(0);
            $table->string('observacion')->nullable();
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
        Schema::dropIfExists('tipo_convenio_institucion');
        Schema::dropIfExists('profesional_institucion_convenio');
    }
}
