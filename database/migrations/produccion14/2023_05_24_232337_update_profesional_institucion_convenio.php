<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProfesionalInstitucionConvenio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profesional_institucion_convenio', function (Blueprint $table) {
            $table->string('id_invitacion')->nullable()->after('token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profesional_institucion_convenio', function (Blueprint $table) {
            $table->dropColumn('id_invitacion');
        });
    }
}

