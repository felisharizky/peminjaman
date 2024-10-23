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
        Schema::create('konfirmasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pinjam_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_kembali')->nullable();
            $table->enum('status', ['pending', 'terkonfirmasi', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konfirmasis');
    }
};
