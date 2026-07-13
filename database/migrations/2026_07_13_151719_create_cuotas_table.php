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
        Schema::create('cuotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('matricula_id')->index('idx_cuota_matricula');
            $table->smallInteger('numero');
            $table->string('concepto', 100);
            $table->date('fecha_vencimiento')->index('idx_cuota_vencimiento');
            $table->decimal('monto', 10);
            $table->enum('estado', ['Pendiente', 'Pagada', 'Vencida', 'Anulada'])->nullable()->default('Pendiente')->index('idx_cuota_estado');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuotas');
    }
};
