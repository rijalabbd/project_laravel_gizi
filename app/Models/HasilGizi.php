<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilGizi extends Model
{
    use HasFactory;

    protected $table = 'hasil_gizis';

    protected $fillable = [
        'id_klien', 
        'tanggal', 
        'kalori', 
        'karbohidrat', 
        'protein', 
        'lemak', 
        'saran_makanan', 
        'saran_aktivitas'
    ];

    public function klien()
    {
        return $this->belongsTo(Klien::class, 'id_klien');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($hasilGizi) {
            $klien = $hasilGizi->klien;  // Ambil klien yang terkait

            // Hitung gizi dan masukkan ke field yang sesuai
            $gizi = $klien->hitungGizi();
            $hasilGizi->kalori = $gizi['kalori'];
            $hasilGizi->karbohidrat = $gizi['karbohidrat'];
            $hasilGizi->protein = $gizi['protein'];
            $hasilGizi->lemak = $gizi['lemak'];
            $hasilGizi->saran_makanan = 'Perbanyak konsumsi sayur dan buah.';
            $hasilGizi->saran_aktivitas = 'Lakukan jogging ringan 30 menit setiap hari.';
        });
    }
}
