<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTextFieldsToReparacionesAudifonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reparaciones_audifono', function (Blueprint $table) {
            // Agregar campos de texto para almacenar valores textuales de los select
            $table->string('motivo_reparacion_text', 255)->nullable()->after('motivo_reparacion')
                  ->comment('Texto del motivo de reparación seleccionado');
            $table->string('estado_reparacion_text', 255)->nullable()->after('estado_reparacion')
                  ->comment('Texto del estado de reparación seleccionado');
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
            $table->dropColumn(['motivo_reparacion_text', 'estado_reparacion_text']);
        });
    }
}
