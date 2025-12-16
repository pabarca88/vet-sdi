<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConConsentiminetoPcte extends Migration
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
            $table->string('id_log_user_devices_revocacion')->nullable()->after('observaciones_con');
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
            $table->drop('id_log_user_devices_revocacion');
        });
    }
}
