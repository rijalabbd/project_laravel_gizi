<?php

namespace App\Filament\Resources\JadwalMakanResource\Pages;

use App\Filament\Resources\JadwalMakanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwalMakans extends ListRecords
{
    protected static string $resource = JadwalMakanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
