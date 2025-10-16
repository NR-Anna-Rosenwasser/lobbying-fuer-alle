<?php

namespace App\Filament\Resources\Concerns\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ConcernInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('title'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                IconEntry::make('parlch_checked')
                    ->boolean(),
                IconEntry::make('past_concerns')
                    ->boolean(),
                IconEntry::make('past_concerns_timespan')
                    ->boolean()
                    ->placeholder('-'),
                IconEntry::make('past_concerns_details')
                    ->boolean()
                    ->placeholder('-'),
                TextEntry::make('experts')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('further_information')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('constituent.id')
                    ->label('Constituent'),
            ]);
    }
}
