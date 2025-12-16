<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNotificacionConfirmacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('notificion_confirmacion', function (Blueprint $table) {
            $table->bigInteger('codigo_autorizacion')->nullable()->after('estado_confirmacion');
            $table->bigInteger('id_log_users_devices')->nullable()->after('codigo_autorizacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notificion_confirmacion', function (Blueprint $table) {
            $table->drop('codigo_autorizacion');
            $table->drop('id_log_users_devices');
        });
    }
}
