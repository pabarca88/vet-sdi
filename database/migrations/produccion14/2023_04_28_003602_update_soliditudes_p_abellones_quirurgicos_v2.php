<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSoliditudesPAbellonesQuirurgicosV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solicitudes_pabellones_quirurgicos', function (Blueprint $table)
        {
            $table->string('otros_antecedentes')->nullable()->after('patalogias_cronicas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solicitudes_pabellones_quirurgicos', function (Blueprint $table) {
            $table->drop('otros_antecedentes');
        });
    }
}
