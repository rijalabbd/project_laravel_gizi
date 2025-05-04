<?php

namespace App\Filament\Resources\KlienResource\Pages;

use App\Filament\Resources\KlienResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKliens extends ListRecords
{
    protected static string $resource = KlienResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
