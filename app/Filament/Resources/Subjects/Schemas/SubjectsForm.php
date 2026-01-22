<?php // app/Filament/Resources/Subjects/Schemas/SubjectsForm.php

namespace App\Filament\Resources\Subjects\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class SubjectsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('class_id')
                    ->label('Class')
                    ->relationship('academicClass', 'name')
                    ->preload()
                    ->required(),

                TextInput::make('sub_name')
                    ->label('Subject Name')
                    ->required()
                    ->maxLength(91),
            ]);
    }
}
