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
        // Menambahkan kolom 'foto' yang bersifat opsional
        Schema::table('user', function (Blueprint $table) {
            $table->string('foto')->nullable(); // kolom 'foto' bersifat nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus kolom 'foto' jika rollback
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('foto');
        });
    }
};
