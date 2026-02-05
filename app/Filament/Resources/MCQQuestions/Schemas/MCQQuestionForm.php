<?php

namespace App\Filament\Resources\MCQQuestions\Schemas;

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

class MCQQuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(4)
            ->components([
                Select::make('class_id')
                    ->label('Class')
                    ->required()
                    ->options(AcademicClass::query()->pluck('name', 'id'))
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('subject_id', null);
                        $set('chapter_id', null);
                        $set('lesson_id', null);
                    }),

                Select::make('subject_id')
                    ->label('Subject')
                    ->required()
                    ->options(fn(Get $get) => Subject::query()
                        ->where('class_id', $get('class_id'))
                        ->pluck('sub_name', 'id'))
                    ->preload()
                    ->live()
                    ->disabled(fn(Get $get) => blank($get('class_id')))
                    ->afterStateUpdated(function (Set $set) {
                        $set('chapter_id', null);
                        $set('lesson_id', null);
                    }),


                Select::make('chapter_id')
                    ->label('Chapter')
                    ->options(fn(Get $get) => Chapter::query()
                        ->where('subject_id', $get('subject_id'))
                        ->pluck('chapter_name', 'id'))
                    ->preload()
                    ->live()
                    ->disabled(fn(Get $get) => blank($get('subject_id')))
                    ->afterStateUpdated(function (Set $set) {
                        $set('lesson_id', null);
                    })
                    ->nullable(),

                Select::make('lesson_id')
                    ->label('Lesson')
                    ->options(fn(Get $get) => Lesson::query()
                        ->where('chapter_id', $get('chapter_id'))
                        ->pluck('lesson_name', 'id'))
                    ->preload()
                    ->live()
                    ->disabled(fn(Get $get) => blank($get('chapter_id')))
                    ->nullable(),

                // FileUpload::make('proviking_img')
                //     ->label('Question Image')
                //     ->image()
                //     ->disk('public')
                //     ->directory('mcq_images')
                //     ->visibility('public')
                //     ->maxSize(3072)
                //     ->dehydrated(true)
                //     ->nullable(),


                TextInput::make('questions')->label('Quesiton')->placeholder('Write Question')->required()->columnSpan(4),

                TextInput::make('option_a')->label('Option A')->placeholder('Option A')->required(),
                TextInput::make('option_b')->label('Option B')->placeholder('Option B')->required(),
                TextInput::make('option_c')->label('Option C')->placeholder('Option C')->required(),
                TextInput::make('option_d')->label('Option D')->placeholder('Option D'),
                TextInput::make('right_answer')->label('Right Answer')->placeholder('Right Answer')->required(),

                TextInput::make('marks')
                    ->label('Marks')
                    ->numeric()
                    ->required()
                    ->default(1),

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
                    ])
                    ->live(),
                Select::make('board_name')
                    ->label('Board Name')
                    ->disabled(fn(Get $get) => $get('type') != 'board_question')
                    ->required(fn(Get $get) => $get('type') == 'board_question')
                    ->options([
                        'dhaka' => 'Dhaka',
                        'chittagong' => 'Chittagong',
                        'rajshahi' => 'Rajshahi',
                        'khulna' => 'Khulna',
                        'barishal' => 'Barishal',
                        'sylhet' => 'Sylhet',
                        'rangpur' => 'Rangpur',
                        'mymensingh' => 'Mymensingh',
                    ]),

                TextInput::make('year')
                    ->label('Year')
                    ->numeric()
                    ->required()
                    ->default(now()->year),

            ]);
    }
}
