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
        Schema::table('notificaciones', function (Blueprint $table) {
            $table->foreign(['academia_id'], 'fk_notificacion_academia')->references(['id'])->on('academias')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['alumno_id'], 'fk_notificacion_alumno')->references(['id'])->on('alumnos')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notificaciones', function (Blueprint $table) {
            $table->dropForeign('fk_notificacion_academia');
            $table->dropForeign('fk_notificacion_alumno');
        });
    }
};
