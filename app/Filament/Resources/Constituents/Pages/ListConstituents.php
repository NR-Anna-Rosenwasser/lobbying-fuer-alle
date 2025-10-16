<?php

namespace App\Filament\Resources\Constituents\Pages;

use App\Filament\Resources\Constituents\ConstituentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListConstituents extends ListRecords
{
    protected static string $resource = ConstituentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
