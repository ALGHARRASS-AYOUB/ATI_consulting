<?php

namespace App\Filament\Resources\ResponsabilityResource\Pages;

use App\Filament\Resources\ResponsabilityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResponsability extends EditRecord
{
    protected static string $resource = ResponsabilityResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
