<?php

namespace App\Filament\Resources\Employees\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->label('First Name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('last_name')
                    ->label('Last Name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('Phone')
                    ->required()
                    ->maxLength(20),
                TextInput::make('position')
                    ->label('Position')
                    ->required()
                    ->maxLength(255),
                TextInput::make('salary')
                    ->label('Salary')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
