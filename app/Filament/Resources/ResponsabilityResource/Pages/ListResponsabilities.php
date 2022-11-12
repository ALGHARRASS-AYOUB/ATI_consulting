<?php

namespace App\Filament\Resources\ResponsabilityResource\Pages;

use App\Filament\Resources\ResponsabilityResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResponsabilities extends ListRecords
{
    protected static string $resource = ResponsabilityResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
