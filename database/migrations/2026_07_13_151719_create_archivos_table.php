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
        Schema::create('archivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('academia_id')->index('fk_archivo_academia');
            $table->enum('entidad_tipo', ['Alumno', 'Profesor', 'Matricula', 'Pago', 'Repertorio', 'Producto']);
            $table->unsignedBigInteger('entidad_id');
            $table->enum('tipo', ['DNI', 'Contrato', 'Ficha Inscripcion', 'Voucher', 'Partitura', 'Letra', 'Audio', 'Video', 'Imagen', 'PDF', 'DOCX', 'Otro'])->nullable()->default('Otro')->index('idx_archivo_tipo');
            $table->string('nombre');
            $table->string('nombre_original');
            $table->string('extension', 20);
            $table->string('mime_type', 100);
            $table->unsignedBigInteger('tamanio');
            $table->string('ruta', 500);
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('usuario_id')->nullable()->index('fk_archivo_usuario');
            $table->boolean('activo')->nullable()->default(true);
            $table->timestamps();

            $table->index(['entidad_tipo', 'entidad_id'], 'idx_archivo_entidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
