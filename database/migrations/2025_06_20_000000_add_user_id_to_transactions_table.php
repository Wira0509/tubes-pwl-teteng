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
        Schema::table('transactions', function (Blueprint $table) {
            // Menambahkan kolom user_id setelah kolom id
            // Kolom ini akan menjadi foreign key ke tabel users
            // onDelete('cascade') berarti jika user dihapus, semua transaksinya juga akan terhapus.
            $table->foreignId('user_id')->after('id')->constrained('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Menghapus foreign key constraint
            $table->dropForeign(['user_id']);
            // Menghapus kolom user_id
            $table->dropColumn('user_id');
        });
    }
};