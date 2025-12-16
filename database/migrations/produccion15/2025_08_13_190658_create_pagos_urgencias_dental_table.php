<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagos_urgencia_dental', function (Blueprint $table) {
            $table->bigIncrements('id'); // bigint(20) UNSIGNED AUTO_INCREMENT

            $table->integer('id_paciente')->unsigned();
            $table->integer('id_profesional')->unsigned();
            $table->integer('id_lugar_atencion')->unsigned();
            $table->integer('id_ficha_atencion')->unsigned()->nullable();

            $table->integer('id_metodo_pago')->unsigned();

            $table->string('metodo_pago', 255)->collation('utf8mb4_unicode_ci');

            $table->date('fecha_pago')->nullable();
            $table->double('total');

            $table->integer('estado')->default(1);
            $table->string('observaciones', 255)->collation('utf8mb4_unicode_ci')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_urgencia_dental');
    }
};
