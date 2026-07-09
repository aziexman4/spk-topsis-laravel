<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('alternatifs', function (Blueprint $table) {
            $table->foreignId('periode_id')->nullable()->constrained('periodes')->onDelete('cascade');
            $table->enum('status', ['menunggu', 'lolos_administrasi', 'gugur'])->default('menunggu');
        });
    }

    public function down(): void
    {
        Schema::table('alternatifs', function (Blueprint $table) {
            $table->dropForeign(['periode_id']);
            $table->dropColumn('periode_id');
            $table->dropColumn('status');
        });
    }
};
