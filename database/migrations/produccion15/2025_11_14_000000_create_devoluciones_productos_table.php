<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucionesProductosTable extends Migration
{
    public function up()
    {
        Schema::create('devoluciones_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_institucion');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_bodega_origen');
            $table->unsignedBigInteger('id_bodega_destino');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('id_responsable');
            $table->integer('cantidad');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            // Opcional: claves foráneas
            // $table->foreign('id_institucion')->references('id')->on('instituciones');
            // $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion');
            // $table->foreign('id_producto')->references('id')->on('productos');
            // $table->foreign('id_bodega_origen')->references('id')->on('bodega');
            // $table->foreign('id_bodega_destino')->references('id')->on('bodega');
            // $table->foreign('id_responsable')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('devoluciones_productos');
    }
}
