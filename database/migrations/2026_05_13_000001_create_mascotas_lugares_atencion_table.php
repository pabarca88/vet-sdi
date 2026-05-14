<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mascotas_lugares_atencion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mascota');
            $table->unsignedBigInteger('id_institucion')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->string('origen', 50)->nullable();
            $table->timestamps();

            $table->unique(['id_mascota', 'id_lugar_atencion'], 'mascota_lugar_unique');
            $table->index('id_institucion');
            $table->index('id_lugar_atencion');

            $table->foreign('id_mascota')
                ->references('id')
                ->on('mascotas')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mascotas_lugares_atencion');
    }
};
