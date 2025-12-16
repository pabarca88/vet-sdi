<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInformesMedicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informes_medicos', function (Blueprint $table)
        {
            $table->string('id_tipo_informe')->default(1)->after('id');
        });

        Schema::create('tipo_informe', function (Blueprint $table) {
            $table->id();
            $table->string('alias')->nullable();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('pdf')->nullable();
            $table->longText('texto')->nullable();
            $table->integer('estado')->nullable()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informes_medicos', function (Blueprint $table) {
            $table->drop('id_tipo_informe');
        });

        Schema::dropIfExists('tipo_informe');
    }
}
