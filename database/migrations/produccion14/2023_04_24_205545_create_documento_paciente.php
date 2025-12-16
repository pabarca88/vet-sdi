<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoPaciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_fc_paciente', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tipo_documento');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_ficha_atencion');
            $table->bigInteger('id_lugar_atencion');
            $table->string('documento')->nullable();
            $table->string('url')->nullable();
            $table->string('observacion')->nullable();
            $table->longText('cuerpo')->nullable();
            $table->dateTime('fecha_envio');
            $table->integer('estado_envio')->default(1)->nullable();
            $table->integer('estado')->default(1)->nullable();
            $table->string('otro')->nullable();
            $table->timestamps();
        });

        Schema::create('tipo_documento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('precargado')->default(0)->nullable();
            $table->integer('id_especialidad');
            $table->integer('id_tipo_especialidad');
            $table->integer('id_sub_tipo_especialidad')->nullable();
            $table->longText('cuerpo')->nullable();
            $table->integer('estado')->default(0)->nullable();
            $table->string('otro')->nullable();
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
        Schema::dropIfExists('documento_paciente');
        Schema::dropIfExists('tipo_documento');
    }
}
