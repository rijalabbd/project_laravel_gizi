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
        Schema::create('jadwal_makans', function (Blueprint $table) {
            $table->id();
            
            // Foreign key ke tabel kliens
            $table->foreignId('id_klien')->constrained('kliens')->onDelete('cascade');

            // Kolom-kolom tambahan sesuai kebutuhan
            $table->string('waktu_makan');
            $table->date('tanggal');
            $table->string('menu');
            $table->integer('kalori_menu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_makans');
    }
};
