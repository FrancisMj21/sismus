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
        Schema::create('grupos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('academia_id');
            $table->unsignedBigInteger('programa_id')->index('idx_grupo_programa');
            $table->unsignedBigInteger('horario_id')->index('idx_grupo_horario');
            $table->unsignedBigInteger('periodo_academico_id')->index('idx_grupo_periodo');
            $table->string('codigo', 20);
            $table->string('nombre', 100);
            $table->string('color', 20)->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('cupo_maximo')->nullable()->default(15);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado', ['Activo', 'Finalizado', 'Suspendido'])->nullable()->default('Activo');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            $table->unique(['academia_id', 'codigo'], 'academia_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
