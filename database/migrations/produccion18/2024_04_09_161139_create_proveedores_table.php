<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->integer('id_sucursal')->nullable();
            $table->integer('id_institucion')->nullable();
            $table->integer('id_comuna');
            $table->integer('id_region');
            $table->integer('id_tipo_producto');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('rut');
            $table->string('telefono');
            $table->string('email');
            $table->string('rol_tributario');
            $table->string('otro')->nullable();
            $table->string('otro2')->nullable();
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
        Schema::dropIfExists('proveedores');
    }
}
