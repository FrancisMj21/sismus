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
        Schema::table('historial_matriculas', function (Blueprint $table) {
            $table->foreign(['matricula_id'], 'fk_historial_matricula')->references(['id'])->on('matriculas')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['usuario_id'], 'fk_historial_usuario')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historial_matriculas', function (Blueprint $table) {
            $table->dropForeign('fk_historial_matricula');
            $table->dropForeign('fk_historial_usuario');
        });
    }
};
