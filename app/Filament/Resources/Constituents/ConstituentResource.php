<?php

namespace App\Filament\Resources\Constituents;

use App\Filament\Resources\Constituents\Pages\CreateConstituent;
use App\Filament\Resources\Constituents\Pages\EditConstituent;
use App\Filament\Resources\Constituents\Pages\ListConstituents;
use App\Filament\Resources\Constituents\Pages\ViewConstituent;
use App\Filament\Resources\Constituents\Schemas\ConstituentForm;
use App\Filament\Resources\Constituents\Schemas\ConstituentInfolist;
use App\Filament\Resources\Constituents\Tables\ConstituentsTable;
use App\Models\Constituent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ConstituentResource extends Resource
{
    protected static ?string $model = Constituent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'fullName';

    public static function form(Schema $schema): Schema
    {
        return ConstituentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ConstituentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ConstituentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListConstituents::route('/'),
            'create' => CreateConstituent::route('/create'),
            'view' => ViewConstituent::route('/{record}'),
            'edit' => EditConstituent::route('/{record}/edit'),
        ];
    }
}
