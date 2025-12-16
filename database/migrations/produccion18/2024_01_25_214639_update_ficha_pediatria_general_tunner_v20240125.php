<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaPediatriaGeneralTunnerV20240125 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_pediatria_general_tunner', function (Blueprint $table)
        {
            $table->bigInteger('id_especialidad')->nullable()->after('id_profesional');
            $table->bigInteger('id_tipo_especialidad')->nullable()->after('id_especialidad');
            $table->bigInteger('id_sub_tipoespecialidad')->nullable()->after('id_tipo_especialidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_pediatria_general_tunner', function (Blueprint $table) {
            $table->drop('id_especialidad');
            $table->drop('id_tipo_especialidad');
            $table->drop('id_sub_tipoespecialidad');
        });
    }
}
