<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_hora_medica');
            $table->integer('origen')->nullable();
            $table->string('tipo_movimiento', 50)->nullable();
            $table->string('rut')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellido_uno')->nullable();
            $table->string('apellido_dos')->nullable();
            $table->string('email')->nullable();
            $table->integer('monto')->nullable();
            $table->string('estado_orden')->nullable();
            $table->bigInteger('sid')->nullable();
            $table->integer('num_cuotas')->nullable();
            $table->string('fecha_pagado_cap', 50)->nullable();
            $table->string('commercecode', 50)->nullable();
            $table->string('sessionid', 50)->nullable();
            $table->string('vci', 50)->nullable();
            $table->string('detalle_rechazo', 50)->nullable();
            $table->integer('ocupado')->nullable();
            $table->string('texto_tipo_pago', 50)->nullable();
            $table->string('resp_code', 50)->nullable();
            $table->string('texto_resp_code', 100)->nullable();
            $table->string('texto_vci', 50)->nullable();
            $table->string('op_idrec')->nullable();
            $table->string('op_fectr')->nullable();
            $table->string('op_tid')->nullable();
            $table->string('op_idcon')->nullable();
            $table->string('op_tiidc')->nullable();
            $table->string('op_idcli')->nullable();
            $table->string('op_fepag')->nullable();
            $table->string('op_doc')->nullable();
            $table->string('op_mnt')->nullable();
            $table->string('op_retcod')->nullable();
            $table->string('op_cau')->nullable();

            $table->integer('estado')->default(1);

            $table->timestamps();
        });

        Schema::create('orden_detalle', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_orden');
            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_hora_medica');

            $table->string('nombre')->nullable();
            $table->integer('cantidad')->nullable();
            $table->integer('unitario')->nullable();
            $table->integer('descuento')->nullable();
            $table->integer('total')->nullable();

            $table->integer('estado')->default(1);

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
        Schema::dropIfExists('orden');
        Schema::dropIfExists('orden_detalle');
    }
}
