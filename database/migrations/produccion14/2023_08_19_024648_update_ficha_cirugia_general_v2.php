<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaCirugiaGeneralV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_cirugia_general', function (Blueprint $table) {
            $table->string('antecedentes')->after('obs_sintoma_cons')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_cirugia_general', function (Blueprint $table) {
            $table->dropColumn('antecedentes');
        });
    }
}
