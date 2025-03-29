<?php

namespace App\Filament\Resources\ListenResource\Pages;

use App\Filament\Resources\ListenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditListen extends EditRecord
{
    protected static string $resource = ListenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
