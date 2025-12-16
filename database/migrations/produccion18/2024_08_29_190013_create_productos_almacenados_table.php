<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosAlmacenadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_almacenados', function (Blueprint $table) {
            $table->id();
            $table->integer('id_producto');
            $table->integer('id_bodega')->nullable();
            $table->double('temperatura');
            $table->integer('id_responsable')->nullable();
            $table->integer('cantidad')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('productos_almacenados');
    }
}
