<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_materiales', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('tipo_solicitud');
            $table->double('cantidad');
            $table->string('uso')->nullable();
            $table->tinyInteger('validacion')->nullable();

            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
            $table->unsignedBigInteger('id_proveedor')->nullable();
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
        Schema::dropIfExists('pedido_materiales');
    }
}