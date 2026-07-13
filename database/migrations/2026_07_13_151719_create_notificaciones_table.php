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
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('academia_id')->index('fk_notificacion_academia');
            $table->unsignedBigInteger('alumno_id')->index('fk_notificacion_alumno');
            $table->enum('tipo', ['Correo', 'WhatsApp', 'SMS', 'Sistema'])->nullable()->default('Sistema');
            $table->string('titulo');
            $table->text('mensaje');
            $table->dateTime('fecha_envio')->nullable();
            $table->enum('estado', ['Pendiente', 'Enviada', 'Error'])->nullable()->default('Pendiente')->index('idx_notificacion_estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
