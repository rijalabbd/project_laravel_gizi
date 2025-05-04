<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KlienResource\Pages;
use App\Filament\Resources\KlienResource\RelationManagers;
use App\Models\Klien;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class KlienResource extends Resource
{
    protected static ?string $model = Klien::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('gender')
                    ->options([
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('umur')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('berat_badan')
                    ->label('Berat Badan (kg)')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('tinggi_badan')
                    ->label('Tinggi Badan (cm)')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('level_aktivitas')
                    ->options([
                        'rendah' => 'Rendah',
                        'sedang' => 'Sedang',
                        'tinggi' => 'Tinggi',
                    ])
                    ->required(),

                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('foto-klien') // akan tersimpan di storage/app/public/foto-klien
                    ->visibility('public')
                    ->imagePreviewHeight('100')
                    ->label('Foto Klien')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('umur')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('berat_badan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tinggi_badan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('level_aktivitas'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->height(50)
                    ->width(50),
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
            'index' => Pages\ListKliens::route('/'),
            'create' => Pages\CreateKlien::route('/create'),
            'edit' => Pages\EditKlien::route('/{record}/edit'),
        ];
    }
}
