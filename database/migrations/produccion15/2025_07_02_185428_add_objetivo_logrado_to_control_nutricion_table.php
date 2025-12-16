<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObjetivoLogradoToControlNutricionTable extends Migration
{
    public function up()
    {
        Schema::table('control_nutricion', function (Blueprint $table) {
            $table->boolean('objetivo_logrado')->default(false)->after('datos_control'); // o el campo que tengas como anterior
        });
    }

    public function down()
    {
        Schema::table('control_nutricion', function (Blueprint $table) {
            $table->dropColumn('objetivo_logrado');
        });
    }
}

