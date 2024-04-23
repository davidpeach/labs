<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Post Details')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('wp_url')
                        ->maxLength(255),
                    Forms\Components\Select::make('category_id')
                        ->relationship('category', 'name')
                        ->required(),
                    SpatieTagsInput::make('tags')
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('excerpt')
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('markdown')
                        ->columnSpanFull()
                        ->rows(10),
                    Forms\Components\Textarea::make('content')
                        ->columnSpanFull()
                        ->rows(10),
                ])
                ->collapsible()
                ->collapsed(),
            Section::make('Images')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('inline_images')
                        ->multiple()
                        ->collection('inline_images'),
                    Forms\Components\FileUpload::make('featured_image')
                        ->image(),
                ])
                ->collapsible()
                ->collapsed(),
            Section::make('Meta')
                ->columns(3)
                ->schema([
                    Forms\Components\TextInput::make('user_id')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('format')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('status')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DateTimePicker::make('published_at')
                        ->required(),
                    Forms\Components\TextInput::make('wp_id')
                        ->numeric(),
                ])
                ->collapsible()
                ->collapsed(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('wp_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('wp_url')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('featured_image'),
                Tables\Columns\TextColumn::make('format')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
