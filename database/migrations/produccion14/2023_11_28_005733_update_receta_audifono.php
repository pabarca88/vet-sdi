<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRecetaAudifono extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receta_audifono', function (Blueprint $table) {
            $table->string('cod_auto')->nullable()->after('especificacion_general');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receta_audifono', function (Blueprint $table) {
            $table->dropColumn('cod_auto');
        });
    }
}
