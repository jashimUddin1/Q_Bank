<?php

namespace App\Filament\Resources\AcademicClasses\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
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
                    ->maxLength(255),
                Hidden::make('created_by')
                    ->default(fn () => Auth::id() ?? 0),
                
            ]);
    }
}
