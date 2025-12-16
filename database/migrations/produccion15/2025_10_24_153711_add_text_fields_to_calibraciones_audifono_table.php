<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTextFieldsToCalibracionesAudifonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calibraciones_audifono', function (Blueprint $table) {
            // Agregar campos de texto para almacenar valores textuales de los select
            $table->string('motivo_control_text', 255)->nullable()->after('motivo_control')
                  ->comment('Texto del motivo de control seleccionado');
            $table->string('estado_audifono_text', 255)->nullable()->after('estado_audifono')
                  ->comment('Texto del estado del audífono seleccionado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calibraciones_audifono', function (Blueprint $table) {
            $table->dropColumn(['motivo_control_text', 'estado_audifono_text']);
        });
    }
}
