<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMedicamentousocronicogeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicamentousocronicogeneral', function (Blueprint $table) {
            $table->bigInteger('id_articulo')->default(null)->nullable()->after('id_profesional');
            $table->bigInteger('id_tipo_control')->default(null)->nullable()->after('nombre_medicamento');
            $table->string('presentacion')->default(null)->nullable()->after('cantidad');
            $table->string('posologia')->default(null)->nullable()->after('presentacion');
            $table->string('via_administracion')->default(null)->nullable()->after('posologia');
            $table->string('periodo')->default(null)->nullable()->after('via_administracion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicamentousocronicogeneral', function (Blueprint $table) {
            $table->dropColumn('id_articulo');
            $table->dropColumn('id_tipo_control');
            $table->dropColumn('presentacion');
            $table->dropColumn('posologia');
            $table->dropColumn('via_administracion');
            $table->dropColumn('periodo');
        });
    }
}
