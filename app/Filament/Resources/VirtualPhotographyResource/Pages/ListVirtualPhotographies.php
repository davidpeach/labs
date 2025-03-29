<?php

namespace App\Filament\Resources\VirtualPhotographyResource\Pages;

use App\Filament\Resources\VirtualPhotographyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVirtualPhotographies extends ListRecords
{
    protected static string $resource = VirtualPhotographyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
