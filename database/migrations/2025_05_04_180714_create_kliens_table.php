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
        Schema::create('kliens', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->enum('gender', ['laki-laki', 'perempuan']);
            $table->integer('umur');
            $table->float('berat_badan'); // dalam kg
            $table->float('tinggi_badan'); // dalam cm
            $table->enum('level_aktivitas', ['rendah', 'sedang', 'tinggi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kliens');
    }
};
