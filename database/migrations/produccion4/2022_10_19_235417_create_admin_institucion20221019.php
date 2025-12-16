<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminInstitucion20221019 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_inst_serv', function (Blueprint $table) {
            $table->id();

            $table->string('rut', 12)->unique();
            $table->string('nombres', 100);
            $table->string('apellido_uno', 50);
            $table->string('apellido_dos', 50);
            $table->string('telefono_uno', 20);
            $table->string('telefono_dos', 20)->nullable();
            $table->char('sexo', 1)->nullable();
            $table->string('email', 200)->unique();
            $table->date('fecha_nac')->nullable();
            $table->unsignedBigInteger('id_tipo_administrador')->nullable();
            $table->unsignedBigInteger('id_premium')->nullable();
            $table->unsignedBigInteger('id_direccion')->nullable();
            $table->unsignedBigInteger('id_antecedente')->nullable();
            $table->unsignedBigInteger('id_admin')->nullable();

            $table->tinyInteger('estado')->defaul('0');
            $table->timestamps();
        });

        Schema::create('tipo_administrador', function (Blueprint $table) {
            $table->id();

            $table->string('nombres', 100);
            $table->string('descripcion', 255);

            $table->tinyInteger('estado')->defaul('1');
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
        Schema::dropIfExists('admin_inst_serv');
        Schema::dropIfExists('tipo_administrador');
    }
}
