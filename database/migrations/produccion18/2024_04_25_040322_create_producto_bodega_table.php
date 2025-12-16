<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoBodegaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_bodega', function (Blueprint $table) {
            $table->id();
            $table->integer('id_bodega')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->integer('id_responsable');
            $table->integer('stock');
            $table->string('otro')->nullable();
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
        Schema::dropIfExists('producto_bodega');
    }
}
