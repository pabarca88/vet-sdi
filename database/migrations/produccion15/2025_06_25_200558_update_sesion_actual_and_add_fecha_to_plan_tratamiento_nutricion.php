<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSesionActualAndAddFechaToPlanTratamientoNutricion extends Migration
{
    public function up(): void
    {
        Schema::table('plan_tratamiento_nutricion', function (Blueprint $table) {
            // Agregar el campo `fecha`
            $table->date('fecha')->nullable()->after('id_lugar_atencion');

            // Modificar el campo `sesion_actual` para que tenga valor por defecto 0
            $table->integer('sesion_actual')->default(0)->change();
        });
    }

    public function down(): void
    {
        Schema::table('plan_tratamiento_nutricion', function (Blueprint $table) {
            // Eliminar el campo `fecha`
            $table->dropColumn('fecha');

            // Revertir el cambio del default de `sesion_actual` (dejarlo nullable si así estaba)
            $table->integer('sesion_actual')->nullable()->change();
        });
    }
}
