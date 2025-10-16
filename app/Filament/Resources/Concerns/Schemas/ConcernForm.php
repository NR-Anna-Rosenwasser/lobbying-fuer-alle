<?php

namespace App\Filament\Resources\Concerns\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;

class ConcernForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                RichEditor::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('parlch_checked')
                    ->required(),
                Toggle::make('past_concerns')
                    ->required(),
                Toggle::make('past_concerns_timespan'),
                Toggle::make('past_concerns_details'),
                Textarea::make('experts')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('further_information')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('constituent_id')
                    ->relationship('constituent', 'id')
                    ->required(),
            ]);
    }
}
