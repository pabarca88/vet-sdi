<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDetallesReceta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalles_receta', function (Blueprint $table) {
            $table->string('id_tipo_control')->default(null)->nullable()->after('id_articulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalles_receta', function (Blueprint $table) {
            $table->dropColumn('id_tipo_control');
        });
    }
}
