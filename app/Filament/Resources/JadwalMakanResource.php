<?php

namespace App\Filament\Resources;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\JadwalMakanResource\Pages;
use App\Filament\Resources\JadwalMakanResource\RelationManagers;
use App\Models\JadwalMakan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalMakanResource extends Resource
{
    protected static ?string $model = JadwalMakan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_klien')
                    ->relationship('klien', 'nama')
                    ->searchable()
                    ->required(),
                Select::make('waktu_makan')
                    ->options([
                        'Pagi' => 'Pagi',
                        'Siang' => 'Siang',
                        'Malam' => 'Malam',
                    ])
                    ->required(),
                DatePicker::make('tanggal')
                    ->required(),
                Select::make('menu')
                    ->options([
                        'Nasi Goreng' => 'Nasi Goreng',
                        'Sate Ayam' => 'Sate Ayam',
                        'Salad Buah' => 'Salad Buah',
                    ])
                    ->required(),
                TextInput::make('kalori_menu')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('klien.nama')->label('Nama Klien'),
                TextColumn::make('waktu_makan'),
                TextColumn::make('tanggal')->date(),
                TextColumn::make('menu'),
                TextColumn::make('kalori_menu')->numeric(),
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
            'index' => Pages\ListJadwalMakans::route('/'),
            'create' => Pages\CreateJadwalMakan::route('/create'),
            'edit' => Pages\EditJadwalMakan::route('/{record}/edit'),
        ];
    }
}
