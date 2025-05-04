<?php

namespace App\Filament\Resources\HasilGiziResource\Pages;

use App\Filament\Resources\HasilGiziResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHasilGizi extends EditRecord
{
    protected static string $resource = HasilGiziResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
