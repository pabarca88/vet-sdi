<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableContratoHistorico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_historico', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_contrato');
            $table->bigInteger('id_user');
            $table->text('data');
            $table->date('fecha');
            $table->time('hora');
            $table->bigInteger('tipo_verificacion_usuario')->nullable();
            $table->string('codigo_verificacion_usuario')->nullable();
            $table->dateTime('fecha_codigo_usuario')->nullable();
            $table->bigInteger('tipo_verificacion_tercero')->nullable();
            $table->string('codigo_verificacion_tercero')->nullable();
            $table->dateTime('fecha_codigo_tercero')->nullable();
            $table->tinyInteger('procesado')->nullable();
            $table->string('estado')->default(1);
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
        Schema::dropIfExists('contrato_historico');
    }
}
