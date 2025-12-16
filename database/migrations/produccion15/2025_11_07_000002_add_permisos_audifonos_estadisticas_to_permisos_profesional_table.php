<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPermisosAudifonosEstadisticasToPermisosProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permisos_profesional', function (Blueprint $table) {
            $table->boolean('permiso_control_audifonos')->default(false)->after('permisos_ver_pacientes');
            $table->boolean('permiso_estadisticas_laboratorio')->default(false)->after('permiso_control_audifonos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permisos_profesional', function (Blueprint $table) {
            $table->dropColumn([
                'permiso_control_audifonos',
                'permiso_estadisticas_laboratorio',
            ]);
        });
    }
}
