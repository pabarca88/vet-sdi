<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSesionActualToPlanTratamientoNutricionTable extends Migration
{
    public function up(): void
    {
        Schema::table('plan_tratamiento_nutricion', function (Blueprint $table) {
            $table->integer('sesion_actual')->nullable()->after('numero_sesiones');
        });
    }

    public function down(): void
    {
        Schema::table('plan_tratamiento_nutricion', function (Blueprint $table) {
            $table->dropColumn('sesion_actual');
        });
    }
}

