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
        Schema::create('horarios_generales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('academia_id')->index('academia_id');
            $table->unsignedBigInteger('especialidad_id')->index('especialidad_id');
            $table->string('nombre', 120)->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->boolean('activo')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_generales');
    }
};
