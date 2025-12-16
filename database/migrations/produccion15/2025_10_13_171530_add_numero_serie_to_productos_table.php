<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumeroSerieToProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            // Agregar campo numero_serie después de codigo_interno
            $table->string('numero_serie', 100)->nullable()->after('codigo_interno')->comment('Número de serie del producto (para audífonos, equipos, etc.)');
            
            // Agregar índice para búsquedas rápidas por número de serie
            $table->index('numero_serie', 'idx_numero_serie');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            // Eliminar índice primero
            $table->dropIndex('idx_numero_serie');
            
            // Eliminar campo numero_serie
            $table->dropColumn('numero_serie');
        });
    }
}
