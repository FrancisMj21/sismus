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
        Schema::create('clases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('grupo_id')->index('fk_clase_grupo');
            $table->unsignedBigInteger('horario_id')->index('fk_clase_horario');
            $table->unsignedBigInteger('profesor_id')->index('fk_clase_profesor');
            $table->date('fecha');
            $table->enum('estado', ['Programada', 'Dictada', 'Cancelada'])->nullable()->default('Programada');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};
