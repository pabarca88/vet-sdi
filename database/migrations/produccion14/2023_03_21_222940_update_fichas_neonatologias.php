<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichasNeonatologias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fichas_neonatologias', function (Blueprint $table)
        {
            $table->bigInteger('id_madre')->nullable()->after('id');
            $table->string('codigo_brazalete')->nullable()->after('id_madre');
            $table->bigInteger('id_infante')->nullable()->after('codigo_brazalete');
            $table->string('tipo_procedimiento')->nullable()->after('id_infante');

            $table->integer('sexo_nacimiento')->nullable()->after('perimetro_cefalico');

            $table->string('nombre_centro')->nullable()->after('id_protocolo');
            $table->string('id_institucion')->nullable()->after('nombre_centro');
            $table->string('otro')->nullable()->after('id_institucion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fichas_neonatologias', function (Blueprint $table) {
            $table->drop('id_madre');
            $table->drop('codigo_brazalete');
            $table->drop('id_infante');
            $table->drop('tipo_procedimiento');
            $table->drop('sexo_nacimiento');
            $table->drop('nombre_centro');
            $table->drop('id_institucion');
            $table->drop('otro');
        });
    }
}
