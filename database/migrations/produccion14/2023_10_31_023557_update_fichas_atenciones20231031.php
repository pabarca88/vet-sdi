<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichasAtenciones20231031 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichas_atenciones', function (Blueprint $table) {
            $table->string('indicaciones')->nullable()->after('diagnostico_ce10');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fichas_atenciones', function (Blueprint $table) {
            $table->dropColumn('indicaciones');
        });
    }
}
