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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('academia_id');
            $table->string('codigo', 30)->nullable();
            $table->string('dni', 20)->nullable();
            $table->string('nombres', 100)->nullable();
            $table->string('apellidos', 100)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('telefono', 30)->nullable();
            $table->string('correo', 150)->nullable();
            $table->string('direccion')->nullable();
            $table->string('contacto_emergencia', 150)->nullable();
            $table->string('telefono_emergencia', 30)->nullable();
            $table->date('fecha_registro')->nullable();
            $table->text('observaciones')->nullable();
            $table->boolean('activo')->nullable()->default(true);
            $table->timestamps();

            $table->unique(['academia_id', 'codigo'], 'academia_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
