<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_detalle', function (Blueprint $table) {
            $table->id();
            $table->integer('id_compra')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->date('fecha_compra');
            $table->double('precio_compra', 8, 2);
            $table->integer('cantidad');
            $table->integer('id_unidad_medida');
            $table->string('lote');
            $table->date('fecha_vencimiento')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('otros')->nullable();
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
        Schema::dropIfExists('compras_detalle');
    }
}
