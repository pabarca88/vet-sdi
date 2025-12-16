<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaOtorrino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_otorrino', function (Blueprint $table) {
            $table->integer('obs_ex_faringeo')->nullable()->default(0)->after('ex_farige_anormal');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_otorrino', function (Blueprint $table) {
            $table->dropColumn('obs_ex_faringeo');
        });
    }
}
