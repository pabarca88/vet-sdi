<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSatisfaccionToMisProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mis_productos', function (Blueprint $table) {
            // Agregar campo satisfaccion después de observaciones
            $table->tinyInteger('satisfaccion')->nullable()->after('observaciones')->comment('Nivel de satisfacción del paciente (1-5 estrellas)');

            // Agregar índice para análisis de satisfacción
            $table->index('satisfaccion', 'idx_satisfaccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mis_productos', function (Blueprint $table) {
            // Eliminar índice primero
            $table->dropIndex('idx_satisfaccion');

            // Eliminar campo satisfaccion
            $table->dropColumn('satisfaccion');
        });
    }
}
