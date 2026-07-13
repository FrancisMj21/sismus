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
        Schema::create('programas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('especialidad_id')->index('especialidad_id');
            $table->string('nombre', 120)->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('orden')->nullable()->default(1);
            $table->boolean('activo')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programas');
    }
};
