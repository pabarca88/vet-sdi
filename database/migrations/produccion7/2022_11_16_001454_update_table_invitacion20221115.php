<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableInvitacion20221115 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invitacion', function (Blueprint $table) {
            $table->string('id_user_invitado')->nullable()->after('id_user_solicitud');
        });
    }

    public function down()
    {
        Schema::table('invitacion', function (Blueprint $table) {
            $table->drop('id_user_invitado');
        });
    }
}
