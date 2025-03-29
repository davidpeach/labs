<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListenResource\Pages;
use App\Filament\Resources\ListenResource\RelationManagers;
use App\Models\Listen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ListenResource extends Resource
{
    protected static ?string $model = Listen::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('song_id')
                    ->relationship('song', 'title')
                    ->required(),
                Forms\Components\TextInput::make('started_at')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('song.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('song.artist.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('song.albums.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('started_at')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListListens::route('/'),
            'create' => Pages\CreateListen::route('/create'),
            'edit' => Pages\EditListen::route('/{record}/edit'),
        ];
    }
}
