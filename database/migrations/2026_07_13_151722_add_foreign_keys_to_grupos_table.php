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
        Schema::table('grupos', function (Blueprint $table) {
            $table->foreign(['academia_id'], 'fk_grupo_academia')->references(['id'])->on('academias')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['horario_id'], 'fk_grupo_horario')->references(['id'])->on('horarios')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['periodo_academico_id'], 'fk_grupo_periodo')->references(['id'])->on('periodos_academicos')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['programa_id'], 'fk_grupo_programa')->references(['id'])->on('programas')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grupos', function (Blueprint $table) {
            $table->dropForeign('fk_grupo_academia');
            $table->dropForeign('fk_grupo_horario');
            $table->dropForeign('fk_grupo_periodo');
            $table->dropForeign('fk_grupo_programa');
        });
    }
};
