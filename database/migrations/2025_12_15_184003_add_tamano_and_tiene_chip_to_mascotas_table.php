<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddTamanoAndTieneChipToMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->boolean('tiene_chip')->default(false)->after('chip');
            $table->string('tamano', 20)->nullable()->after('otra_especie');
        });

        DB::table('mascotas')->whereNotNull('chip')->update(['tiene_chip' => true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->dropColumn(['tiene_chip', 'tamano']);
        });
    }
}
