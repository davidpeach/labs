<?php

namespace App\Filament\Resources\ListenResource\Pages;

use App\Filament\Resources\ListenResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListListens extends ListRecords
{
    protected static string $resource = ListenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
