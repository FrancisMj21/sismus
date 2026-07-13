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
        Schema::table('pagos', function (Blueprint $table) {
            $table->foreign(['cuota_id'], 'fk_pago_cuota')->references(['id'])->on('cuotas')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['usuario_id'], 'fk_pago_usuario')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->dropForeign('fk_pago_cuota');
            $table->dropForeign('fk_pago_usuario');
        });
    }
};
