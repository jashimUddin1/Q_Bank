<?php

namespace App\Filament\Resources\Chapters\Schemas;

use App\Models\AcademicClass;
use App\Models\Subject;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ChapterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               
                Select::make('class_id')
                    ->label('Class')
                    ->options(AcademicClass::query()->pluck('name', 'id'))
              
                    ->preload()
                    ->live() // ✅ important: reactive
                    ->required()
                    ->afterStateUpdated(fn ($set) => $set('subject_id', null)),

                // ✅ Dependent Subject dropdown
                Select::make('subject_id')
                    ->label('Subject')
                    ->options(function ($get) {
                        $classId = $get('class_id');

                        if (! $classId) {
                            return [];
                        }

                        return Subject::query()
                            ->where('class_id', $classId)
                            ->pluck('sub_name', 'id');
                    })
              
                    ->preload()
                    ->required()
                    ->disabled(fn ($get) => ! $get('class_id')) 
                    ->helperText(fn ($get) => ! $get('class_id') ? 'Please select Class first.' : null),
                
                TextInput::make('chapter_name')
                    ->label('Chapter Name')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
