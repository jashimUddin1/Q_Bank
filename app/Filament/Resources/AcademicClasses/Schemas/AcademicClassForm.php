<?php

namespace App\Filament\Resources\AcademicClasses\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class AcademicClassForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Class Name')
                    ->required()
                    ->maxLength(91),
            ]);
    }
}
