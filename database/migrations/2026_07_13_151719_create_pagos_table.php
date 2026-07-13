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
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cuota_id')->index('idx_pago_cuota');
            $table->unsignedBigInteger('usuario_id')->index('fk_pago_usuario');
            $table->dateTime('fecha_pago')->index('idx_pago_fecha');
            $table->decimal('monto', 10);
            $table->enum('metodo_pago', ['Efectivo', 'Yape', 'Plin', 'Transferencia', 'Tarjeta'])->nullable()->default('Efectivo');
            $table->string('numero_operacion', 100)->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
