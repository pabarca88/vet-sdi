<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBiopsiaFieldsToExamenesDentalPeriodonciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examenes_dental_periodoncia', function (Blueprint $table) {
            $table->string('biopsia', 50)->nullable()->after('obs_perio_pza');
            $table->string('zona_motivo', 100)->nullable()->after('biopsia');
            $table->text('observaciones_biopsia')->nullable()->after('zona_motivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examenes_dental_periodoncia', function (Blueprint $table) {
            $table->dropColumn(['biopsia', 'zona_motivo', 'observaciones_biopsia']);
        });
    }
}
