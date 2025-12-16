<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePlanTratamientoNutricionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('plan_tratamiento_nutricion', 'plan_tratamiento_otros_profesionales');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('plan_tratamiento_otros_profesionales', 'plan_tratamiento_nutricion');
    }
}
