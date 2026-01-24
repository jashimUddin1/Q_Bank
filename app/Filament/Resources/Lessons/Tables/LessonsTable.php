<?php

namespace App\Filament\Resources\Lessons\Tables;

use App\Models\Subject;
use Filament\Tables\Table;
use App\Models\AcademicClass;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Filters\Filter;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;

class LessonsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('chapter.subject.academicClass.name')
                    ->label('Class')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('chapter.subject.sub_name')
                    ->label('Subject')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('chapter.chapter_name')
                    ->label('Chapter')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('lesson_name')
                    ->label('Lesson')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Filter::make('class_subject')
                    ->label('Filters')
                    ->schema([ // ✅ v5 updated (যদি তোমারটায় schema না থাকে, নিচের B নাও)
                        Select::make('class_id')
                            ->label('Class')
                            ->options(AcademicClass::query()->pluck('name', 'id')->toArray())
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function ($set) {
                                $set('subject_id', null);
                            }),

                        Select::make('subject_id')
                            ->label('Subject')
                            ->options(function ($get) {
                                $classId = $get('class_id');
                                if (! $classId) return [];

                                return Subject::query()
                                    ->where('class_id', $classId)
                                    ->pluck('sub_name', 'id')
                                    ->toArray();
                            })
                            ->preload()
                            ->disabled(fn ($get) => ! $get('class_id'))
                            ->helperText(fn ($get) => ! $get('class_id') ? 'Please select Class first.' : null),
                    ])
                    ->query(function ($query, array $data) {
                        $classId = $data['class_id'] ?? null;
                        $subjectId = $data['subject_id'] ?? null;

                        // ✅ class filter: lesson -> chapter -> subject -> class
                        if ($classId) {
                            $query->whereHas('chapter.subject', function ($q) use ($classId) {
                                $q->where('class_id', $classId);
                            });
                        }

                        // ✅ subject filter: lesson -> chapter -> subject_id
                        if ($subjectId) {
                            $query->whereHas('chapter', function ($q) use ($subjectId) {
                                $q->where('subject_id', $subjectId);
                            });
                        }
                    }),
            ])
            ->filtersLayout(FiltersLayout::BeforeContent)
            // ->filtersFormColumns(3)
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
