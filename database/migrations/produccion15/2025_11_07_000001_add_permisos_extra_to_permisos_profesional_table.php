<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPermisosExtraToPermisosProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permisos_profesional', function (Blueprint $table) {
            $table->boolean('permiso_anular_hora')->default(false)->after('permiso_vender_audifonos');
            $table->boolean('permiso_subir_ver_archivos')->default(false)->after('permiso_anular_hora');
            $table->boolean('permiso_eliminar_archivos')->default(false)->after('permiso_subir_ver_archivos');
            $table->boolean('permiso_editar_pacientes')->default(false)->after('permiso_eliminar_archivos');
            $table->boolean('permisos_ver_pacientes')->default(false)->after('permiso_editar_pacientes');
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
                'permiso_anular_hora',
                'permiso_subir_ver_archivos',
                'permiso_eliminar_archivos',
                'permiso_editar_pacientes',
                'permisos_ver_pacientes',
            ]);
        });
    }
}
