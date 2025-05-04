<?php

namespace App\Filament\Resources\HasilGiziResource\Pages;

use App\Filament\Resources\HasilGiziResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHasilGizi extends CreateRecord
{
    protected static string $resource = HasilGiziResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $klien = \App\Models\Klien::find($data['id_klien']);

        if ($klien) {
            $gizi = $klien->hitungGizi();
            $data['kalori'] = $gizi['kalori'];
            $data['karbohidrat'] = $gizi['karbohidrat'];
            $data['protein'] = $gizi['protein'];
            $data['lemak'] = $gizi['lemak'];
            $data['saran_makanan'] = 'Perbanyak konsumsi sayur dan buah.';
            $data['saran_aktivitas'] = 'Lakukan jogging ringan 30 menit setiap hari.';
        }

        // Tanggal sekarang
        $data['tanggal'] = now();

        return $data;
    }
}
