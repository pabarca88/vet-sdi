<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosSolicitadosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('productos_solicitados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto');
            $table->string('tipo_producto');
            $table->integer('cantidad');
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('id_responsable');
            $table->timestamp('fecha')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('productos_solicitados');
    }
}
