<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPlanTratamientoToControlNutricionTable extends Migration
{
    public function up()
    {
        Schema::table('control_nutricion', function (Blueprint $table) {
            $table->foreignId('id_plan_tratamiento')
                ->nullable()
                ->constrained('plan_tratamientos') // tabla relacionada
                ->nullOnDelete(); // o ->cascadeOnDelete() si prefieres
        });
    }

    public function down()
    {
        Schema::table('control_nutricion', function (Blueprint $table) {
            $table->dropForeign(['id_plan_tratamiento']);
            $table->dropColumn('id_plan_tratamiento');
        });
    }
}
