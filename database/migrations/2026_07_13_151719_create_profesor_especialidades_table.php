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
        Schema::create('profesor_especialidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('profesor_id');
            $table->unsignedBigInteger('especialidad_id')->index('especialidad_id');
            $table->timestamps();

            $table->unique(['profesor_id', 'especialidad_id'], 'profesor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_especialidades');
    }
};
