<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecomendacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recomendacion', function (Blueprint $table) {
            $table->id();

            $table->longText('atencion')->nullable(); //id_ficha_atencion
            $table->longText('salida')->nullable(); //id_ingreso_paciente
            $table->longText('herir')->nullable(); //id_recuperacion
            $table->longText('cuadro')->nullable(); //id_sala
            $table->longText('activo'); //id_paciente
            $table->longText('aficionado'); //id_profesional
            $table->longText('control'); //id_tipo_control
            $table->longText('cod_doc'); //token_doc
            $table->longText('cod_auto'); //token_auto
            $table->longText('info')->nullable(); //pdf

            $table->integer('estado')->default(1);

            $table->timestamps();
        });

        Schema::create('recomendacion_detalle', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_recomendacion'); //id_receta
            $table->longText('control'); //id_tipo_control
            $table->longText('id_articulo')->nullable(); //id_producto
            $table->longText('articulo'); //producto
            $table->longText('componente'); //farmaco
            $table->longText('id_apariencia')->nullable(); //id_presentacion
            $table->longText('apariencia'); //presentacion
            $table->longText('id_cuota')->nullable(); //id_receta_dosis
            $table->longText('cuota'); //posologia
            $table->longText('id_regimen')->nullable(); //id_via_administracion
            $table->longText('regimen'); //via_administracion
            $table->longText('id_lapso')->nullable(); //id_periodo
            $table->longText('lapso'); //periodo
            $table->longText('uso_frecuente')->nullable(); //uso_cronico
            $table->longText('volumen_compra'); //cantidad_compra
            $table->longText('volumen')->nullable(); //cantidad
            $table->longText('volumen_entregado')->nullable(); //cantidad_vendida
            $table->longText('comentario')->nullable(); //comentario
            $table->longText('cod_doc'); //token_doc

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
        Schema::dropIfExists('recomendacion');
        Schema::dropIfExists('recomendacion_detalle');
    }
}
