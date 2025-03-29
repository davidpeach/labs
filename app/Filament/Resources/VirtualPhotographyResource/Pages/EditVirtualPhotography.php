<?php

namespace App\Filament\Resources\VirtualPhotographyResource\Pages;

use App\Filament\Resources\VirtualPhotographyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVirtualPhotography extends EditRecord
{
    protected static string $resource = VirtualPhotographyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
