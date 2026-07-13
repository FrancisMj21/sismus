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
        Schema::create('grupo_profesores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('grupo_id')->index('idx_gp_grupo');
            $table->unsignedBigInteger('profesor_id')->index('idx_gp_profesor');
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->boolean('es_principal')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_profesores');
    }
};
