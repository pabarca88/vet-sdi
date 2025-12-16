<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('campanias_publicitarias', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lugar_atencion')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campanias_publicitarias', function (Blueprint $table) {
            $table->dropColumn('id_lugar_atencion');
        });
    }
};
