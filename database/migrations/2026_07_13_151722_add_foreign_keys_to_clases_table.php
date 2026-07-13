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
        Schema::table('clases', function (Blueprint $table) {
            $table->foreign(['grupo_id'], 'fk_clase_grupo')->references(['id'])->on('grupos')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['horario_id'], 'fk_clase_horario')->references(['id'])->on('horarios')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['profesor_id'], 'fk_clase_profesor')->references(['id'])->on('profesores')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clases', function (Blueprint $table) {
            $table->dropForeign('fk_clase_grupo');
            $table->dropForeign('fk_clase_horario');
            $table->dropForeign('fk_clase_profesor');
        });
    }
};
