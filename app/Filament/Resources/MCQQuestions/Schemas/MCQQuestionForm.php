<?php

namespace App\Filament\Resources\MCQQuestions\Schemas;

use App\Models\User;
use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\Subject;
use Filament\Schemas\Schema;
use App\Models\AcademicClass;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class MCQQuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('class_id')
                    ->label('Class')
                    ->required()
                    ->options(AcademicClass::query()->pluck('name', 'id')),

                Select::make('subject_id')
                    ->label('Subject')
                    ->required()
                    ->options(Subject::query()->pluck('sub_name', 'id')),


                Select::make('chapter_id')
                    ->label('Chapter')
                    ->options(Chapter::query()->pluck('chapter_name', 'id')),

                Select::make('lesson_id')
                    ->label('Lesson')
                    ->options(Lesson::query()->pluck('lesson_name', 'id')),

                TextInput::make('questions')->label('Quesiton')->placeholder('Write Question')->required(),
                TextInput::make('option_a')->label('Option A')->placeholder('Option A')->required(),
                TextInput::make('option_b')->label('Option B')->placeholder('Option B')->required(),
                TextInput::make('option_c')->label('Option C')->placeholder('Option C')->required(),
                TextInput::make('option_d')->label('Option D')->placeholder('Option D'),
                TextInput::make('right_answer')->label('Right Answer')->placeholder('Right Answer')->required(),

                Select::make('level')
                    ->label('Level')
                    ->required()
                    ->options([
                        'easy' => 'Easy',
                        'medium' => 'Medium',
                        'hard' => 'Hard'
                    ]),
                Select::make('type')
                    ->label('Type')
                    ->required()
                    ->options([
                        'board_question' => 'Board Question',
                        'model_question' => 'Model Quesiton',
                        'custom_question' => 'Custom Question'
                    ]),
                TextInput::make('year')->numeric()->required(),
                
            ]);
    }
}


