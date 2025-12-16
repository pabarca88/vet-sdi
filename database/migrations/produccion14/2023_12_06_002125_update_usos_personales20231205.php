<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsosPersonales20231205 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usos_personales', function (Blueprint $table) {
            $table->string('cod_auto')->nullable()->after('id_tipo_uso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usos_personales', function (Blueprint $table) {
            $table->dropColumn('cod_auto');
        });
    }
}
