<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('procedimientos_implantes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_procedimiento')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('procedimientos_implantes', function (Blueprint $table) {
            $table->dropColumn('id_procedimiento');
        });
    }
};
