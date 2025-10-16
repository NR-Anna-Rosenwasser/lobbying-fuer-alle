<?php

namespace App\Filament\Resources\Constituents\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ConstituentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('fname')
                    ->required(),
                TextInput::make('lname')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
                TextInput::make('pronouns')
                    ->default(null),
            ]);
    }
}
