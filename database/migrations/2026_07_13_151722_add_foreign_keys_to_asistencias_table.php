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
        Schema::table('asistencias', function (Blueprint $table) {
            $table->foreign(['clase_id'], 'fk_asistencia_clase')->references(['id'])->on('clases')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['matricula_id'], 'fk_asistencia_matricula')->references(['id'])->on('matriculas')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['clase_original_id'], 'fk_asistencia_original')->references(['id'])->on('clases')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['created_by'], 'fk_asistencia_usuario')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asistencias', function (Blueprint $table) {
            $table->dropForeign('fk_asistencia_clase');
            $table->dropForeign('fk_asistencia_matricula');
            $table->dropForeign('fk_asistencia_original');
            $table->dropForeign('fk_asistencia_usuario');
        });
    }
};
