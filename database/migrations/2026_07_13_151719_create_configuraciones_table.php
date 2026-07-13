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
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('academia_id');
            $table->string('clave', 100);
            $table->text('valor')->nullable();
            $table->string('descripcion')->nullable();
            $table->timestamps();

            $table->unique(['academia_id', 'clave'], 'idx_configuracion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuraciones');
    }
};
