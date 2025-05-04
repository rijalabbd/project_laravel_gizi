<?php

namespace App\Filament\Resources\HasilGiziResource\Pages;

use App\Filament\Resources\HasilGiziResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHasilGizis extends ListRecords
{
    protected static string $resource = HasilGiziResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
