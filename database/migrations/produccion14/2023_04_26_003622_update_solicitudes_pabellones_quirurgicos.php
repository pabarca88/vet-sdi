<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSolicitudesPabellonesQuirurgicos extends Migration
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
            $table->string('id_hospital')->nullable()->after('grado_urgencia');
            $table->string('hospital')->nullable()->after('id_hospital');
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
            $table->drop('id_hospital');
            $table->drop('hospital');
        });
    }
}
