<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_compras', function (Blueprint $table) {
            $table->id();

            // Relación con usuario/profesional que está realizando la venta
            $table->unsignedBigInteger('id_usuario')->nullable()->comment('Usuario que agregó el producto');
            $table->unsignedBigInteger('id_profesional')->nullable()->comment('Profesional que realiza la venta');

            // Relación con paciente (opcional, para ventas directas)
            $table->unsignedBigInteger('id_paciente')->nullable()->comment('Paciente al que se venderá');
            $table->unsignedBigInteger('id_ficha')->nullable()->comment('Ficha de atención relacionada');

            // Información del producto
            $table->unsignedBigInteger('id_producto')->comment('ID del producto en tabla productos');
            $table->string('codigo_producto', 50)->nullable()->comment('Código del producto (cache)');
            $table->string('nombre_producto', 255)->comment('Nombre del producto (cache)');
            $table->string('marca_producto', 100)->nullable()->comment('Marca del producto (cache)');
            $table->string('tipo_producto', 100)->nullable()->comment('Tipo de producto (cache)');

            // Cantidad y precios
            $table->integer('cantidad')->default(1)->comment('Cantidad de productos');
            $table->decimal('precio_unitario', 10, 2)->nullable()->comment('Precio unitario del producto');
            $table->decimal('descuento', 10, 2)->default(0)->comment('Descuento aplicado');
            $table->decimal('subtotal', 10, 2)->nullable()->comment('Subtotal (precio * cantidad - descuento)');

            // Stock al momento de agregar
            $table->integer('stock_disponible')->nullable()->comment('Stock disponible al momento de agregar');

            // Información adicional
            $table->text('observaciones')->nullable()->comment('Observaciones sobre el producto');
            $table->string('image_path', 500)->nullable()->comment('Ruta de la imagen del producto (cache)');

            // Estado del carrito
            $table->enum('estado', ['activo', 'procesado', 'cancelado', 'expirado'])->default('activo')->comment('Estado del item en el carrito');

            // Identificador de sesión para carritos temporales
            $table->string('session_id', 100)->nullable()->comment('ID de sesión temporal');

            // Lugar de atención y bodega
            $table->unsignedBigInteger('id_lugar_atencion')->nullable()->comment('Lugar de atención');
            $table->unsignedBigInteger('id_bodega')->nullable()->comment('Bodega desde donde se vende');

            // Fecha de expiración del carrito (opcional)
            $table->timestamp('expira_en')->nullable()->comment('Fecha de expiración del carrito');

            $table->timestamps();
            $table->softDeletes(); // Para eliminación lógica

            // Índices para mejorar rendimiento
            $table->index('id_usuario');
            $table->index('id_profesional');
            $table->index('id_paciente');
            $table->index('id_producto');
            $table->index('session_id');
            $table->index('estado');
            $table->index(['id_usuario', 'estado']);
            $table->index(['session_id', 'estado']);

            // Llaves foráneas (opcional, depende de tu estructura)
            // Descomenta estas líneas si quieres usar restricciones de integridad referencial
            /*
            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('id_profesional')
                  ->references('id')
                  ->on('profesionales')
                  ->onDelete('set null');

            $table->foreign('id_paciente')
                  ->references('id')
                  ->on('pacientes')
                  ->onDelete('set null');

            $table->foreign('id_producto')
                  ->references('id')
                  ->on('productos')
                  ->onDelete('cascade');

            $table->foreign('id_lugar_atencion')
                  ->references('id')
                  ->on('lugar_atencion')
                  ->onDelete('set null');

            $table->foreign('id_bodega')
                  ->references('id')
                  ->on('bodegas')
                  ->onDelete('set null');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrito_compras');
    }
}
