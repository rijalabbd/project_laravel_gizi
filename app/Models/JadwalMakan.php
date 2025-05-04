<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMakan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_makans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_klien',
        'waktu_makan',
        'tanggal',
        'menu',
        'kalori_menu',
    ];

    /**
     * Relasi ke model Klien.
     */
    public function klien()
    {
        return $this->belongsTo(Klien::class, 'id_klien');
    }
}
