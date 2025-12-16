<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTipoProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tipo_productos', function (Blueprint $table) {
            $table->id();
            
            // Relación con tipo_producto
            $table->unsignedBigInteger('id_tipo_producto');
            
            // Información del subtipo
            $table->string('nombre', 100);
            $table->string('descripcion', 255)->nullable();
            $table->string('codigo', 20)->nullable()->comment('Código interno del subtipo');
            
            // Estado
            $table->boolean('activo')->default(true)->comment('1 = Activo, 0 = Inactivo');
            
            // Orden para mostrar
            $table->integer('orden')->default(0)->comment('Orden de visualización');
            
            // Auditoría
            $table->timestamps();
            $table->softDeletes();
            
            // Índices
            $table->index('id_tipo_producto');
            $table->index(['id_tipo_producto', 'activo']);
            $table->index('codigo');
            
            // Clave foránea (opcional - comentada por si no existe la tabla tipo_producto)
            // $table->foreign('id_tipo_producto')
            //       ->references('id')
            //       ->on('tipo_producto')
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_tipo_productos');
    }
}
