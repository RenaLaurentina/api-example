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
        Schema::table('catatans', function (Blueprint $table) {
            // Ditambahkan ->after('id') untuk penempatan kolom yang lebih rapi
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catatans', function (Blueprint $table) {
            // Pastikan Anda menghapus foreign key sebelum menghapus kolom
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};