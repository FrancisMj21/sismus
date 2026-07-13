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
        Schema::table('profesores', function (Blueprint $table) {
            $table->foreign(['academia_id'], 'fk_prof_academia')->references(['id'])->on('academias')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'], 'fk_prof_user')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profesores', function (Blueprint $table) {
            $table->dropForeign('fk_prof_academia');
            $table->dropForeign('fk_prof_user');
        });
    }
};
