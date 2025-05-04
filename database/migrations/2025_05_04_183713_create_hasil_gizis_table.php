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
        Schema::create('hasil_gizis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_klien')->constrained('kliens')->onDelete('cascade');
            $table->date('tanggal');
            $table->float('kalori');
            $table->float('karbohidrat');
            $table->float('protein');
            $table->float('lemak');
            $table->text('saran_makanan');
            $table->text('saran_aktivitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_gizis');
    }
};
