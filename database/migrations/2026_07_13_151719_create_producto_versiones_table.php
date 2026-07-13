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
        Schema::create('producto_versiones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('producto_id')->index('idx_producto_version');
            $table->integer('version');
            $table->string('nombre', 150)->nullable();
            $table->decimal('precio', 10);
            $table->integer('duracion_dias');
            $table->enum('beneficio_tipo', ['Ninguno', 'Horario General'])->nullable()->default('Ninguno');
            $table->enum('beneficio_unidad', ['Dias', 'Semanas', 'Meses'])->nullable()->default('Dias');
            $table->integer('beneficio_cantidad')->nullable()->default(0);
            $table->date('fecha_inicio_vigencia');
            $table->date('fecha_fin_vigencia')->nullable();
            $table->text('observaciones')->nullable();
            $table->boolean('activo')->nullable()->default(true);
            $table->timestamps();

            $table->index(['fecha_inicio_vigencia', 'fecha_fin_vigencia'], 'idx_producto_vigencia');
            $table->unique(['producto_id', 'version'], 'producto_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_versiones');
    }
};
