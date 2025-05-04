<?php

namespace App\Filament\Resources\JadwalMakanResource\Pages;

use App\Filament\Resources\JadwalMakanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwalMakan extends EditRecord
{
    protected static string $resource = JadwalMakanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
