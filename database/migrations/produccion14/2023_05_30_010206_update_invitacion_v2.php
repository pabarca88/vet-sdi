<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInvitacionV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invitacion', function (Blueprint $table) {
            $table->integer('id_especialidad')->nullable()->after('email');
            $table->integer('id_tipo_especialidad')->nullable()->after('id_especialidad');
            $table->integer('id_sub_tipo_especialidad')->nullable()->after('id_tipo_especialidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invitacion', function (Blueprint $table) {
            $table->dropColumn('id_especialidad');
            $table->dropColumn('id_tipo_especialidad');
            $table->dropColumn('id_sub_tipo_especialidad');
        });
    }
}
