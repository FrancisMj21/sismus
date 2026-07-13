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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('academia_id')->index('fk_matricula_academia');
            $table->unsignedBigInteger('alumno_id')->index('idx_matricula_alumno');
            $table->unsignedBigInteger('grupo_id')->index('idx_matricula_grupo');
            $table->unsignedBigInteger('producto_version_id')->index('fk_matricula_producto');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('beneficio_inicio')->nullable();
            $table->date('beneficio_fin')->nullable();
            $table->date('vigente_hasta')->index('idx_matricula_vigencia');
            $table->decimal('precio', 10);
            $table->decimal('descuento', 10)->nullable()->default(0);
            $table->enum('estado', ['Activo', 'Suspendido', 'Finalizado', 'Retirado'])->nullable()->default('Activo')->index('idx_matricula_estado');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
