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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_klien')->constrained('kliens')->onDelete('cascade'); // Relasi dengan Klien
            $table->foreignId('id_hasil_gizi')->constrained('hasil_gizis')->onDelete('cascade'); // Relasi dengan HasilGizi
            $table->timestamp('tanggal')->default(now()); // Tanggal riwayat dibuat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};
