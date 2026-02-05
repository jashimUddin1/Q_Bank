<?php

namespace App\Filament\Resources\CQQuestions\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class CQQuestionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('proviking')
                    ->label('Proviking')
                    ->limit(50),
                TextColumn::make('question_a')
                    ->label('A')
                    ->limit(50),
                TextColumn::make('question_b')
                    ->label('B')
                    ->limit(50),
                TextColumn::make('question_c')
                    ->label('C')
                    ->limit(50),
                TextColumn::make('question_d')
                    ->label('D')
                    ->limit(50),

                TextColumn::make('total_marks')
                    ->label('Marks'),

                TextColumn::make('lavel')
                    ->label('Level'),
                TextColumn::make('type')
                    ->label('Type'),
                TextColumn::make('board_name')
                    ->label('Board'),
                TextColumn::make('year')
                    ->label('Year'),

                TextColumn::make('AcademicClass.name')
                    ->label('Class')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('subject.sub_name')
                    ->label('Subject')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Chapter.chapter_name')
                    ->label('Chapter')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Lesson.lesson_name')
                    ->label('Lesson')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
