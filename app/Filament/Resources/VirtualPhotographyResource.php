<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VirtualPhotographyResource\Pages;
use App\Filament\Resources\VirtualPhotographyResource\RelationManagers;
use App\Models\Post;
use App\PostKind;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VirtualPhotographyResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Virtual Photography';

    protected static ?string $navigationGroup = 'Post Types';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('kind', PostKind::VIRTUAL_PHOTOGRAPHY);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                        ->maxLength(255),
                Forms\Components\Select::make('game_id')
                        ->relationship(name: 'game', titleAttribute: 'title'),
                Forms\Components\DateTimePicker::make('published_at')
                    ->default(now())
                    ->required(),
                Forms\Components\Textarea::make('markdown')
                    ->columnSpanFull()
                    ->rows(10),
                Forms\Components\Textarea::make('content')
                    ->columnSpanFull()
                    ->rows(10),
                SpatieMediaLibraryFileUpload::make('featured_image')
                    ->collection('featured_images'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->orderBy('published_at', 'desc'))
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('featured'),
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
            'index' => Pages\ListVirtualPhotographies::route('/'),
            'create' => Pages\CreateVirtualPhotography::route('/create'),
            'edit' => Pages\EditVirtualPhotography::route('/{record}/edit'),
        ];
    }
}
