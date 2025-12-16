<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCierreDiario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cierre_diario', function (Blueprint $table) {
            $table->id();

            $table->string('rendiciones')->nullable();
            $table->bigInteger('id_asistente_jefe');
            $table->dateTime('fecha_rendicion');

            $table->integer('total_documentos')->nullable()->default(0);
            $table->integer('total_bono')->nullable()->default(0);
            $table->bigInteger('total_efectivo')->nullable()->default(0);
            $table->integer('total_otros')->nullable()->default(0);

            $table->bigInteger('id_asistente_receptor');
            $table->dateTime('fecha_recepcion')->nullable();
            $table->string('id_log_users_devices')->nullable();
            $table->string('codigo_autorizacion')->nullable();

            $table->string('observacion')->nullable();
            $table->string('otro')->nullable();

            $table->integer('estado')->nullable()->default('0');// 0.en rendicion - 1.aprobado - 2.rechazado

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
        Schema::dropIfExists('cierre_diario');
    }
}
