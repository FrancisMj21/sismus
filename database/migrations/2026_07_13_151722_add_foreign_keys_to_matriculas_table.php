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
        Schema::table('matriculas', function (Blueprint $table) {
            $table->foreign(['academia_id'], 'fk_matricula_academia')->references(['id'])->on('academias')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['alumno_id'], 'fk_matricula_alumno')->references(['id'])->on('alumnos')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['grupo_id'], 'fk_matricula_grupo')->references(['id'])->on('grupos')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['producto_version_id'], 'fk_matricula_producto')->references(['id'])->on('producto_versiones')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->dropForeign('fk_matricula_academia');
            $table->dropForeign('fk_matricula_alumno');
            $table->dropForeign('fk_matricula_grupo');
            $table->dropForeign('fk_matricula_producto');
        });
    }
};
