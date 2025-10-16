<?php

namespace App\Filament\Resources\Constituents\Pages;

use App\Filament\Resources\Constituents\ConstituentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditConstituent extends EditRecord
{
    protected static string $resource = ConstituentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
