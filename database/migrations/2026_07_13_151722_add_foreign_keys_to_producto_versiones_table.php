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
        Schema::table('producto_versiones', function (Blueprint $table) {
            $table->foreign(['producto_id'], 'fk_producto_version')->references(['id'])->on('productos')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('producto_versiones', function (Blueprint $table) {
            $table->dropForeign('fk_producto_version');
        });
    }
};
