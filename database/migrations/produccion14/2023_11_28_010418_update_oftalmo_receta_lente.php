<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOftalmoRecetaLente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oftalmo_receta_lente', function (Blueprint $table) {
            $table->string('cod_auto')->nullable()->after('r_obs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oftalmo_receta_lente', function (Blueprint $table) {
            $table->dropColumn('cod_auto');
        });
    }
}
