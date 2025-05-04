<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RiwayatResource\Pages;
use App\Filament\Resources\RiwayatResource\RelationManagers;
use App\Models\Riwayat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class RiwayatResource extends Resource
{
    protected static ?string $model = Riwayat::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_klien')
                    ->relationship('klien', 'nama')
                    ->required(),
                Select::make('id_hasil_gizi')
                    ->relationship('hasilGizi', 'id') // Gunakan relasi yang benar
                    ->required(),
                DatePicker::make('tanggal')
                    ->default(now())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('klien.nama')->label('Nama Klien'),
                TextColumn::make('hasilGizi.kalori')->label('Kalori'),
                TextColumn::make('tanggal')->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRiwayats::route('/'),
            'create' => Pages\CreateRiwayat::route('/create'),
            'edit' => Pages\EditRiwayat::route('/{record}/edit'),
        ];
    }
}
