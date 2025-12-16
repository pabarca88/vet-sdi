<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedente', function (Blueprint $table) {
    
            $table->engine = 'MyISAM';

            $table->id();
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_tipo_antecedente');
            $table->bigInteger('id_users');
            $table->longtext('comentario')->nullable();
            $table->longtext('data')->nullable();
            $table->integer('template')->default(0);
            $table->integer('estado')->nullable()->default(0);
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
        Schema::drop('antecedente');
    }
}
