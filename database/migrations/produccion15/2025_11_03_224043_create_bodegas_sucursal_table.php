<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodegasSucursalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodegas_sucursal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sucursal')->comment('ID de la sucursal');
            $table->unsignedBigInteger('id_bodega')->comment('ID de la bodega');
            $table->foreign('id_sucursal')->references('id')->on('sucursales')->onDelete('cascade');
            $table->foreign('id_bodega')->references('id')->on('bodegas')->onDelete('cascade');
            $table->unique(['id_sucursal', 'id_bodega'], 'unique_sucursal_bodega');
            $table->boolean('activo')->default(true)->comment('Indica si la bodega está activa para la sucursal');
            $table->integer('id_responsable')->nullable()->comment('ID del usuario responsable de la bodega en la sucursal');
            $table->string('ubicacion_fisica')->nullable()->comment('Ubicación física de la bodega dentro de la sucursal');
            $table->string('observaciones')->nullable()->comment('Observaciones adicionales sobre la bodega en la sucursal');
            $table->timestamps();

            $table->index('id_sucursal');
            $table->index('id_bodega');
            $table->index('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bodegas_sucursal');
    }
}
