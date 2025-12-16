<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConConsentimientosPcte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('con_consentimientos_pcte', function (Blueprint $table)
        {
            $table->string('diagnostico_cons')->nullable()->after('id_profesional');
            $table->string('cirugia_cons')->nullable()->after('diagnostico_cons');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('con_consentimientos_pcte', function (Blueprint $table) {
            $table->drop('diagnostico_cons');
            $table->drop('cirugia_cons');
        });
    }
}
