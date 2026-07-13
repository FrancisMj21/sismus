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
        Schema::table('grupo_profesores', function (Blueprint $table) {
            $table->foreign(['grupo_id'], 'fk_gp_grupo')->references(['id'])->on('grupos')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['profesor_id'], 'fk_gp_profesor')->references(['id'])->on('profesores')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grupo_profesores', function (Blueprint $table) {
            $table->dropForeign('fk_gp_grupo');
            $table->dropForeign('fk_gp_profesor');
        });
    }
};
