<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoSesionesToPlanTratamientoNutricionTable extends Migration
{
    public function up()
    {
        Schema::table('plan_tratamiento_nutricion', function (Blueprint $table) {
            $table->string('tipo_sesiones')->nullable()->after('sesion_actual');
        });
    }

    public function down()
    {
        Schema::table('plan_tratamiento_nutricion', function (Blueprint $table) {
            $table->dropColumn('tipo_sesiones');
        });
    }
}

