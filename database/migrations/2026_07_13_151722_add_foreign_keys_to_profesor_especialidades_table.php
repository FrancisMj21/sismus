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
        Schema::table('profesor_especialidades', function (Blueprint $table) {
            $table->foreign(['profesor_id'], 'profesor_especialidades_ibfk_1')->references(['id'])->on('profesores')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['especialidad_id'], 'profesor_especialidades_ibfk_2')->references(['id'])->on('especialidades')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profesor_especialidades', function (Blueprint $table) {
            $table->dropForeign('profesor_especialidades_ibfk_1');
            $table->dropForeign('profesor_especialidades_ibfk_2');
        });
    }
};
