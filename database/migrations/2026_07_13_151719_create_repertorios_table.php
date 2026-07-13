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
        Schema::create('repertorios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('matricula_id')->index('idx_repertorio_matricula');
            $table->unsignedBigInteger('profesor_id')->index('idx_repertorio_profesor');
            $table->unsignedBigInteger('especialidad_id')->index('idx_repertorio_especialidad');
            $table->string('titulo');
            $table->string('autor')->nullable();
            $table->string('tono', 100)->nullable();
            $table->string('link_youtube', 500)->nullable();
            $table->integer('orden')->nullable()->default(1);
            $table->enum('estado', ['Pendiente', 'En Practica', 'Dominada', 'Presentada'])->nullable()->default('Pendiente')->index('idx_repertorio_estado');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repertorios');
    }
};
