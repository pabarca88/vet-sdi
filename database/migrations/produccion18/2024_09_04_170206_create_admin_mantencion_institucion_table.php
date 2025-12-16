<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminMantencionInstitucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_mantencion_institucion', function (Blueprint $table) {
            $table->id();
            $table->integer('empresa')->nullable();
            $table->string('rut');
            $table->string('razon_social')->nullable();
            $table->string('giro')->nullable();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('telefono_uno');
            $table->string('telefono_dos')->nullable();
            $table->char('sexo', 1)->nullable();
            $table->string('email');
            $table->string('bienvenido')->default(0);
            $table->date('fecha_nac')->nullable();
            $table->integer('id_tipo_administrador')->nullable();
            $table->integer('id_premium')->nullable();
            $table->integer('id_direccion')->nullable();
            $table->integer('id_antecedente')->nullable();
            $table->integer('id_admin')->nullable();
            $table->integer('estado');
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
        Schema::dropIfExists('admin_mantencion_institucion');
    }
}
