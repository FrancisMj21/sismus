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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('clase_id')->index('idx_asistencia_clase');
            $table->unsignedBigInteger('matricula_id')->index('idx_asistencia_matricula');
            $table->enum('estado', ['Asistio', 'Falta', 'Recuperada'])->nullable()->default('Asistio')->index('idx_asistencia_estado');
            $table->boolean('es_recuperacion')->nullable()->default(false);
            $table->unsignedBigInteger('clase_original_id')->nullable()->index('fk_asistencia_original');
            $table->dateTime('fecha_recuperacion')->nullable();
            $table->text('motivo_recuperacion')->nullable();
            $table->unsignedBigInteger('created_by')->nullable()->index('fk_asistencia_usuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
