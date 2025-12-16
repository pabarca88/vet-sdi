<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoBodega20221125 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodega', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_institucion');
            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_responsable');
            $table->string('alias');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->tinyInteger('estado')->default(0)->nullable();
            $table->timestamps();
        });

        Schema::create('categoria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_bodega');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->tinyInteger('estado')->default(0)->nullable();
            $table->timestamps();
        });

        Schema::create('sub_categoria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_bodega');
            $table->bigInteger('id_categoria');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->tinyInteger('estado')->default(0)->nullable();
            $table->timestamps();
        });

        Schema::create('tipo_unidad', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_bodega');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('cantidad')->default(1)->nullable();
            $table->tinyInteger('estado')->default(0)->nullable();
            $table->timestamps();
        });

        Schema::create('producto_bodega', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_bodega');
            $table->bigInteger('id_categoria');
            $table->bigInteger('id_sub_categoria')->nullable();
            $table->bigInteger('id_tipo_unidad');
            $table->string('sku')->nullable();
            $table->string('alias');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->text('observacion')->nullable();
            $table->decimal('valor_unidad',10,2)->default(0)->nullable();
            $table->decimal('precio_referencia',10,2)->default(0)->nullable();
            $table->integer('punto_pedido')->default(0)->nullable();
            $table->integer('cantidad_stock')->default(0)->nullable();
            $table->string('imagen')->nullable();
            $table->string('imagen_mini')->nullable();
            $table->tinyInteger('estado')->default(0)->nullable();
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
        Schema::dropIfExists('bodega');
        Schema::dropIfExists('categoria');
        Schema::dropIfExists('sub_categoria');
        Schema::dropIfExists('tipo_unidad');
        Schema::dropIfExists('producto_bodega');
    }
}
