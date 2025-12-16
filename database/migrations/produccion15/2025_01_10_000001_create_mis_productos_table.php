<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mis_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_paciente');
            $table->date('fecha_compra');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->text('observaciones')->nullable();
            $table->tinyInteger('estado')->default(1)->comment('1=Activo, 0=Inactivo');
            $table->timestamps();
            $table->softDeletes();

            // Índices para mejorar el rendimiento de búsquedas
            $table->index('id_producto');
            $table->index('id_paciente');
            $table->index('id_profesional');
            $table->index('id_lugar_atencion');
            $table->index(['id_paciente', 'estado']);
            $table->index(['id_paciente', 'id_producto']);
            $table->index('fecha_compra');

            // Claves foráneas opcionales (descomenta si las tablas referenciadas existen)
            // $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            // $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            // $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            // $table->foreign('id_lugar_atencion')->references('id')->on('lugares_atencion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mis_productos');
    }
}
