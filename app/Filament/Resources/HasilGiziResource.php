<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HasilGiziResource\Pages;
use App\Filament\Resources\HasilGiziResource\RelationManagers;
use App\Models\HasilGizi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextArea;

class HasilGiziResource extends Resource
{
    protected static ?string $model = HasilGizi::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id_klien')
                    ->relationship('klien', 'nama')
                    ->searchable()
                    ->required(),
                DatePicker::make('tanggal')
                    ->default(now())
                    ->disabled()
                    ->dehydrated(),
                TextInput::make('kalori')
                    ->numeric()
                    ->required(),
                TextInput::make('karbohidrat')
                    ->numeric()
                    ->required(),
                TextInput::make('protein')
                    ->numeric()
                    ->required(),
                TextInput::make('lemak')
                    ->numeric()
                    ->required(),
                TextArea::make('saran_makanan')
                    ->required(),
                TextArea::make('saran_aktivitas')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('klien.nama')->label('Nama Klien'),
                Tables\Columns\TextColumn::make('tanggal')->date(),
                Tables\Columns\TextColumn::make('kalori'),
                Tables\Columns\TextColumn::make('karbohidrat'),
                Tables\Columns\TextColumn::make('protein'),
                Tables\Columns\TextColumn::make('lemak'),
                Tables\Columns\TextColumn::make('saran_makanan'),
                Tables\Columns\TextColumn::make('saran_aktivitas'),
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
            'index' => Pages\ListHasilGizis::route('/'),
            'create' => Pages\CreateHasilGizi::route('/create'),
            'edit' => Pages\EditHasilGizi::route('/{record}/edit'),
        ];
    }
}
