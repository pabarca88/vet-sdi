<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proveedor');
            $table->integer('id_usuario');
            $table->date('fecha_emision');
            $table->string('numero_factura');
            $table->double('total', 8, 2)->default(0);
            $table->double('iva', 8, 2)->default(0);
            $table->double('descuento', 8, 2)->default(0);
            $table->double('total_final', 8, 2)->default(0);
            $table->date('fecha_pago')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('otros')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamps();
    
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
