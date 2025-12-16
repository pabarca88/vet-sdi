<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesTable extends Migration
{
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('numero'); // COT-2024-0001
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('profesional_id');
            $table->date('fecha');
            $table->date('valida_hasta');
            $table->integer('validez_dias')->default(15);

            // Datos del cliente
            $table->string('cliente_rut', 15);
            $table->string('cliente_nombre', 255);
            $table->string('cliente_telefono', 20)->nullable();
            $table->string('cliente_email', 100)->nullable();

            // Detalles de la cotización
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('descuento_total', 12, 2)->default(0);
            $table->decimal('iva', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);

            $table->string('forma_pago', 50)->nullable();
            $table->text('observaciones')->nullable();

            // Estados: borrador, generada, enviada, aceptada, rechazada, anulada
            $table->enum('estado', ['borrador', 'generada', 'enviada', 'aceptada', 'rechazada', 'anulada'])
                  ->default('borrador');

            $table->string('pdf_path')->nullable();
            $table->timestamp('fecha_envio_email')->nullable();
            $table->timestamp('fecha_aceptacion')->nullable();
            $table->timestamp('fecha_anulacion')->nullable();
            $table->text('motivo_anulacion')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Índices
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('profesional_id')->references('id')->on('profesionals')->onDelete('cascade');
            $table->index('numero');
            $table->index('fecha');
            $table->index('estado');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
}
