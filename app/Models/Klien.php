<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    use HasFactory;

    protected $table = 'kliens'; // atau ganti jika nama tabel berbeda

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'gender',
        'umur',
        'berat_badan',
        'tinggi_badan',
        'level_aktivitas',
        'foto',
    ];

    public function jadwalMakans()
    {
        return $this->hasMany(JadwalMakan::class, 'id_klien');
    }

    public function hasilGizis()
    {
        return $this->hasMany(HasilGizi::class, 'id_klien');
    }
    
    public function riwayats()
    {
        return $this->hasMany(Riwayat::class, 'id_riwayat');
    }

    public function hitungGizi()
    {
        $bmr = 66 + (13.7 * $this->berat_badan) + (5 * $this->tinggi_badan) - (6.8 * $this->umur);

        // Faktor aktivitas
        $faktor = match ($this->level_aktivitas) {
            'rendah' => 1.2,
            'sedang' => 1.55,
            'tinggi' => 1.9,
        };

        $kalori = $bmr * $faktor;

        return [
            'kalori' => round($kalori),
            'karbohidrat' => round(($kalori * 0.5) / 4),  // 4 kalori/gram
            'protein' => round(($kalori * 0.2) / 4),
            'lemak' => round(($kalori * 0.3) / 9),        // 9 kalori/gram
        ];
    }
}
