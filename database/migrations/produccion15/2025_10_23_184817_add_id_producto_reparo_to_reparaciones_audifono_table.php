<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdProductoReparoToReparacionesAudifonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reparaciones_audifono', function (Blueprint $table) {
            // Agregar campo id_producto_reparo después de id_hora_medica
            $table->unsignedBigInteger('id_producto_reparo')->nullable()->after('id_hora_medica')->comment('ID del producto que reparó el audífono');

            // Agregar índice para mejorar performance
            $table->index('id_producto_reparo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reparaciones_audifono', function (Blueprint $table) {
            // Eliminar índice y campo
            $table->dropIndex(['id_producto_reparo']);
            $table->dropColumn('id_producto_reparo');
        });
    }
}
