<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use App\PostKind;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

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
                    Forms\Components\TextInput::make('wp_id')
                        ->numeric(),
                    Forms\Components\TextInput::make('category_id')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('user_id')
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('title')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('slug')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('wp_url')
                        ->maxLength(255),
                    Forms\Components\Select::make('kind')
                        ->options(PostKind::class)
                        ->required(),
                    Forms\Components\DateTimePicker::make('published_at')
                        ->default(now())
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
                    Forms\Components\TextInput::make('format')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('status')
                        ->required()
                        ->maxLength(255),
                ])
                ->collapsible(),
            Section::make('Images')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('inline_images')
                        ->multiple()
                        ->collection('inline_images'),
                    SpatieMediaLibraryFileUpload::make('featured_image')
                        ->collection('featured_images'),
                ])
                ->collapsible()
                ->collapsed(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->orderBy('published_at', 'desc'))
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kind')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('featured'),
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
                SelectFilter::make('category')->relationship('category', 'name'),
                SelectFilter::make('kind')->options(PostKind::class),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->slideOver(),
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
        ];
    }
}
