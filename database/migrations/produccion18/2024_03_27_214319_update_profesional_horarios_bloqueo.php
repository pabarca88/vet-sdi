<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProfesionalHorariosBloqueo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profesional_horarios_bloqueo', function (Blueprint $table)
        {
            $table->bigInteger('id_user')->nullable()->after('todo_dia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profesional_horarios_bloqueo', function (Blueprint $table) {
            $table->drop('id_user');
        });
    }
}
