<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayats';

    protected $fillable = [
        'id_klien',
        'id_hasil_gizi',
        'tanggal',
    ];

    // Relasi ke Klien
    public function klien()
    {
        return $this->belongsTo(Klien::class, 'id_klien');
    }

    // Relasi ke HasilGizi
    public function hasilGizi()
    {
        return $this->belongsTo(HasilGizi::class, 'id_hasil_gizi', 'id'); // Sesuaikan dengan nama kolom yang benar
    }
}
