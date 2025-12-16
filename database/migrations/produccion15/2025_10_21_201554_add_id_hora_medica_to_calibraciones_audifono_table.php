<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdHoraMedicaToCalibracionesAudifonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calibraciones_audifono', function (Blueprint $table) {
            // Agregar el campo id_hora_medica después de id_profesional
            $table->unsignedBigInteger('id_hora_medica')->nullable()->after('id_profesional')->comment('Referencia a la hora médica asociada');

            // Agregar índice para mejorar performance
            $table->index('id_hora_medica');

            // Opcional: Agregar clave foránea si la tabla horas_medicas existe
            // $table->foreign('id_hora_medica')->references('id')->on('horas_medicas')->onDelete('set null');
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
            // Eliminar índice y campo en orden inverso
            $table->dropIndex(['id_hora_medica']);
            $table->dropColumn('id_hora_medica');
        });
    }
}
