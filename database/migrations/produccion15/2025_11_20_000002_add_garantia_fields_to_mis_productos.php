<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGarantiaFieldsToMisProductos extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('mis_productos', function (Blueprint $table) {
            $table->integer('tiene_garantia')->default(0)->after('observaciones');
            $table->string('tipo_garantia', 50)->nullable()->after('tiene_garantia');
            $table->double('valor_garantia', 15, 2)->nullable()->after('tipo_garantia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('mis_productos', function (Blueprint $table) {
            $table->dropColumn(['tiene_garantia', 'tipo_garantia', 'valor_garantia']);
        });
    }
}
