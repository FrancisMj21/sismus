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
        Schema::table('repertorios', function (Blueprint $table) {
            $table->foreign(['especialidad_id'], 'fk_repertorio_especialidad')->references(['id'])->on('especialidades')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['matricula_id'], 'fk_repertorio_matricula')->references(['id'])->on('matriculas')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['profesor_id'], 'fk_repertorio_profesor')->references(['id'])->on('profesores')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('repertorios', function (Blueprint $table) {
            $table->dropForeign('fk_repertorio_especialidad');
            $table->dropForeign('fk_repertorio_matricula');
            $table->dropForeign('fk_repertorio_profesor');
        });
    }
};
