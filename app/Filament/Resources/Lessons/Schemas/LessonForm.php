<?php

namespace App\Filament\Resources\Lessons\Schemas;

use App\Models\AcademicClass;
use App\Models\Subject;
use App\Models\Chapter;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class LessonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            // not to save in DB (only for dependent dropdowns)
            Select::make('class_id')
                ->label('Class')
                ->options(AcademicClass::query()->pluck('name', 'id')->toArray())
                // ->searchable()
                ->preload()
                ->live()
                ->required()
                ->dehydrated(false) // ✅ save হবে না
                ->afterStateUpdated(fn ($set) => $set('subject_id', null))
                ->afterStateUpdated(fn ($set) => $set('chapter_id', null)),

            // not to save in DB (only for dependent dropdowns)
            Select::make('subject_id')
                ->label('Subject')
                ->options(function ($query) {
                    $classId = $query('class_id');
                    if (! $classId) return [];

                    return Subject::query()
                        ->where('class_id', $classId)
                        ->pluck('sub_name', 'id')
                        ->toArray();
                })
                // ->searchable()
                ->preload()
                ->live()
                ->required()
                ->dehydrated(false) // ✅ save হবে না
                ->disabled(fn ($query) => ! $query('class_id'))
                ->helperText(fn ($query) => ! $query('class_id') ? 'Please select Class first.' : null)
                ->afterStateUpdated(fn ($set) => $set('chapter_id', null)),

            // DB field (lessons.chapter_id)
            Select::make('chapter_id')
                ->label('Chapter')
                ->options(function ($query) {
                    $subjectId = $query('subject_id');
                    if (! $subjectId) return [];

                    return Chapter::query()
                        ->where('subject_id', $subjectId)
                        ->pluck('chapter_name', 'id')
                        ->toArray();
                })
                // ->searchable()
                ->preload()
                ->required()
                ->disabled(fn ($query) => ! $query('subject_id'))
                ->helperText(fn ($query) => ! $query('subject_id') ? 'Please select Subject first.' : null),

            TextInput::make('lesson_name')
                ->label('Lesson Name')
                ->required()
                ->maxLength(255),

        ]);
    }
}
