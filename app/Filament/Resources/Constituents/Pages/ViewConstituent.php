<?php

namespace App\Filament\Resources\Constituents\Pages;

use App\Filament\Resources\Constituents\ConstituentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewConstituent extends ViewRecord
{
    protected static string $resource = ConstituentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
