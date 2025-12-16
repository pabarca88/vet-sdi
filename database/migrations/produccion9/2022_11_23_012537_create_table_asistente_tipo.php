<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAsistenteTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistente_tipo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });

        Schema::table('asistentes', function (Blueprint $table) {
            $table->string('id_tipo_asistente')->nullable()->after('id_premium');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistente_tipo');

        Schema::table('asistentes', function (Blueprint $table) {
            $table->drop('id_tipo_asistente');
        });
    }
}
