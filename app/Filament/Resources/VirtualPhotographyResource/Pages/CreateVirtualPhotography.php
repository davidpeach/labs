<?php

namespace App\Filament\Resources\VirtualPhotographyResource\Pages;

use App\Filament\Resources\VirtualPhotographyResource;
use App\PostKind;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVirtualPhotography extends CreateRecord
{
    protected static string $resource = VirtualPhotographyResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['kind'] = PostKind::VIRTUAL_PHOTOGRAPHY;

        return $data;
    }
}
