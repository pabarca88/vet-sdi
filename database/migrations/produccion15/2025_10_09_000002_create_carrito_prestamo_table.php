<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoPrestamoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_prestamo', function (Blueprint $table) {
            $table->id();

            // Relación con usuario/profesional que está realizando el préstamo
            $table->unsignedBigInteger('id_usuario')->nullable()->comment('Usuario que agregó el producto');
            $table->unsignedBigInteger('id_profesional')->nullable()->comment('Profesional que realiza el préstamo');

            // Relación con paciente (opcional, para préstamos directos)
            $table->unsignedBigInteger('id_paciente')->nullable()->comment('Paciente al que se presta');
            $table->unsignedBigInteger('id_ficha')->nullable()->comment('Ficha de atención relacionada');

            // Información del producto
            $table->unsignedBigInteger('id_producto')->comment('ID del producto en tabla productos');
            $table->string('codigo_producto', 50)->nullable()->comment('Código del producto (cache)');
            $table->string('nombre_producto', 255)->comment('Nombre del producto (cache)');
            $table->string('marca_producto', 100)->nullable()->comment('Marca del producto (cache)');
            $table->string('tipo_producto', 100)->nullable()->comment('Tipo de producto (cache)');

            // Cantidad y precios (para préstamos, precio podría ser 0 o simbólico)
            $table->integer('cantidad')->default(1)->comment('Cantidad de productos prestados');
            $table->decimal('precio_unitario', 10, 2)->nullable()->comment('Precio unitario del producto (si aplica)');
            $table->decimal('descuento', 10, 2)->default(0)->comment('Descuento aplicado (si aplica)');
            $table->decimal('subtotal', 10, 2)->nullable()->comment('Subtotal (precio * cantidad - descuento, si aplica)');

            // Stock al momento de prestar
            $table->integer('stock_disponible')->nullable()->comment('Stock disponible al momento de prestar');

            // Información adicional
            $table->text('observaciones')->nullable()->comment('Observaciones sobre el préstamo');
            $table->string('image_path', 500)->nullable()->comment('Ruta de la imagen del producto (cache)');

            // Estado del carrito de préstamo
            $table->enum('estado', ['activo', 'procesado', 'cancelado', 'expirado'])->default('activo')->comment('Estado del item en el carrito de préstamo');

            // Identificador de sesión para carritos temporales
            $table->string('session_id', 100)->nullable()->comment('ID de sesión temporal');

            // Lugar de atención y bodega
            $table->unsignedBigInteger('id_lugar_atencion')->nullable()->comment('Lugar de atención');
            $table->unsignedBigInteger('id_bodega')->nullable()->comment('Bodega desde donde se presta');

            // Fechas de préstamo y devolución
            $table->timestamp('fecha_prestamo')->nullable()->comment('Fecha en que se realizó el préstamo');
            $table->timestamp('fecha_devolucion_esperada')->nullable()->comment('Fecha esperada de devolución');
            $table->timestamp('fecha_devolucion_real')->nullable()->comment('Fecha real de devolución');

            // Estado específico del préstamo
            $table->enum('estado_prestamo', ['prestado', 'devuelto', 'perdido', 'danado', 'vencido'])->default('prestado')->comment('Estado específico del préstamo');

            // Información de devolución
            $table->text('observaciones_devolucion')->nullable()->comment('Observaciones al momento de la devolución');

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
            $table->index('estado_prestamo');
            $table->index(['id_usuario', 'estado']);
            $table->index(['session_id', 'estado']);
            $table->index(['id_paciente', 'estado_prestamo']);

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
        Schema::dropIfExists('carrito_prestamo');
    }
}
