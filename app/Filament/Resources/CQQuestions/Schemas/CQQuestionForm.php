<?php

namespace App\Filament\Resources\CQQuestions\Schemas;

use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\Subject;
use Filament\Schemas\Schema;
use App\Models\AcademicClass;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class CQQuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(4)
            ->components([                
                Select::make('class_id')
                    ->label('Class')
                    ->options(AcademicClass::query()->pluck('name','id'))
                    // ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function (Set $set){
                        $set('subject_id', null);
                        $set('chapter_id', null);
                        $set('lesson_id', null);
                    })
                    ->required(),

                Select::make('subject_id')
                    ->label('Subject')
                    ->options(fn (Get $get) => Subject::query()
                    ->where('class_id', $get('class_id'))
                    ->pluck('sub_name', 'id'))
                    // ->searchable()
                    ->preload()
                    ->live()
                    ->disabled(fn (Get $get) => blank($get('class_id')))
                    ->afterStateUpdated(function(Set $set){
                        $set('chapter_id', null);
                        $set('lesson_id', null);
                    })
                    ->required(),

                Select::make('chapter_id')
                    ->label('Chapter')
                    ->options(fn(Get $get)=>Chapter::query()->where('subject_id', $get('subject_id'))->pluck('chapter_name','id'))
                    // ->searchable()
                    ->preload()
                    ->live()
                    ->disabled(fn(Get $get)=>blank($get('subject_id')))
                    ->afterStateUpdated(function(Set $set){
                        $set('lesson_id', null);
                    })
                    ->nullable(),

                Select::make('lesson_id')
                    ->label('Lesson')
                    ->options(fn(Get $get)=> Lesson::query()->where('chapter_id', $get('chapter_id'))->pluck('lesson_name', 'id'))
                    // ->searchable()
                    ->preload()
                    ->live()
                    ->disabled(fn(Get $get) => blank($get('chapter_id')))
                    ->nullable(),

                // FileUpload::make('proviking_img')
                //     ->label('Proviking Image')
                //     ->image()
                //     ->maxSize(50120)
                //     ->nullable(),

                TextInput::make('proviking')
                    ->label('Proviking')
                    ->columnSpan(3)
                    ->required(),

                TextInput::make('total_marks')
                    ->label('Total Marks')
                    ->numeric()
                    ->default(10)
                    ->columnSpan(1)
                    ->required(),
                
                TextInput::make('question_a')
                    ->label('Question A')
                    ->required(),

                TextInput::make('question_b')
                    ->label('Question B')
                    ->required(),

                TextInput::make('question_c')
                    ->label('Question C')
                    ->required(),

                TextInput::make('question_d')
                    ->label('Question D'),

                TextInput::make('marks_a')
                    ->label('Marks A')
                    ->numeric()
                    ->default(1)
                    ->required(),
                TextInput::make('marks_b')
                    ->label('Marks B')
                    ->numeric()
                    ->default(2)
                    ->required(),

                TextInput::make('marks_c')
                    ->label('Marks C')
                    ->numeric()
                    ->default(3)
                    ->required(),
            
                TextInput::make('marks_d')
                    ->label('Marks D')
                    ->numeric()
                    ->default(4),
                
                Select::make('lavel')
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
                    ])
                    ->live(),

                TextInput::make('board_name')
                    ->label('Board Name')
                    ->disabled(fn(Get $get)=> $get('type') != 'board_question')
                    ->required(fn(Get $get)=> $get('type') == 'board_question'),

                TextInput::make('year')
                    ->label('Year')
                    ->numeric()
                    ->default(2026)
                    ->required(),

            ]);
    }
}

