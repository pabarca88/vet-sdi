<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPlanTratamientoToAtencionNutricionTable extends Migration
{
    public function up()
    {
        Schema::table('atencion_nutricion', function (Blueprint $table) {
            $table->foreignId('id_plan_tratamiento')
                  ->nullable()
                  ->constrained('plan_tratamientos')
                  ->nullOnDelete(); // o ->cascadeOnDelete() si prefieres eliminar en cascada
        });
    }

    public function down()
    {
        Schema::table('atencion_nutricion', function (Blueprint $table) {
            $table->dropForeign(['id_plan_tratamiento']);
            $table->dropColumn('id_plan_tratamiento');
        });
    }
}

