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
        Schema::table('periodos_academicos', function (Blueprint $table) {
            $table->foreign(['academia_id'], 'periodos_academicos_ibfk_1')->references(['id'])->on('academias')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('periodos_academicos', function (Blueprint $table) {
            $table->dropForeign('periodos_academicos_ibfk_1');
        });
    }
};
