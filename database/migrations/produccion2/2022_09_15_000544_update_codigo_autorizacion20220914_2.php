<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCodigoAutorizacion202209142 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('codigos_autorizaciones', function (Blueprint $table) {
            $table->bigInteger('telefono_autoriza')->after('id_parentezco_autoriza');
            $table->bigInteger('email_autoriza')->after('telefono_autoriza');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('codigos_autorizaciones', function (Blueprint $table) {
			Schema::drop('telefono_autoriza');
			Schema::drop('email_autoriza');
        });
    }
}
