<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRendicionCaja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendicion_caja', function (Blueprint $table) {
            $table->id();

            $table->string('tipo_rendicion'); // cm - consulta
            $table->longText('bonos'); //id bonos 1,2,3,4,5...
            $table->bigInteger('id_asistente');
            $table->dateTime('fecha_rendicion');

            $table->integer('total_documentos');
            $table->integer('total_bono')->nullable()->default(0);
            $table->bigInteger('total_efectivo')->nullable()->default(0);
            $table->integer('total_otros')->nullable()->default(0);

            $table->bigInteger('id_asistente_receptor');
            $table->dateTime('fecha_recepcion')->nullable();
            $table->string('codigo_autorizacion')->nullable();
            $table->string('observacion')->nullable();
            $table->string('otro')->nullable();
            $table->integer('estado')->nullable()->default('0');// 0.en rendicion - 1.aprobado - 2.rechazado

            $table->timestamps();
        });

        Schema::create('rendicion_tipo', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('descripcion');
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
        Schema::dropIfExists('rendicion_caja');
        Schema::dropIfExists('rendicion_tipo');
    }
}
