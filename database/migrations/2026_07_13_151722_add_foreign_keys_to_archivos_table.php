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
        Schema::table('archivos', function (Blueprint $table) {
            $table->foreign(['academia_id'], 'fk_archivo_academia')->references(['id'])->on('academias')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['usuario_id'], 'fk_archivo_usuario')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('archivos', function (Blueprint $table) {
            $table->dropForeign('fk_archivo_academia');
            $table->dropForeign('fk_archivo_usuario');
        });
    }
};
