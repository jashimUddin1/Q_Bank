<?php

namespace App\Filament\Resources\Lessons\Tables;

use App\Models\Subject;
use App\Models\Chapter;
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
                Filter::make('class_subject_chapter')
                    ->label('Filters')
                    ->schema([
                        // ✅ Class
                        Select::make('class_id')
                            ->label('Class')
                            ->options(fn () => AcademicClass::query()->pluck('name', 'id')->toArray())
                            ->preload()
                            ->searchable()
                            ->live()
                            ->afterStateUpdated(function ($set) {
                                // class change হলে subject & chapter reset
                                $set('subject_id', null);
                                $set('chapter_id', null);
                            }),

                        // ✅ Subject (depends on Class)
                        Select::make('subject_id')
                            ->label('Subject')
                            ->options(function ($get) {
                                $classId = $get('class_id');
                                if (! $classId) {
                                    return [];
                                }

                                return Subject::query()
                                    ->where('class_id', $classId)
                                    ->orderBy('sub_name')
                                    ->pluck('sub_name', 'id')
                                    ->toArray();
                            })
                            ->preload()
                            ->searchable()
                            ->live()
                            ->disabled(fn ($get) => ! $get('class_id'))
                            ->afterStateUpdated(function ($set) {
                                // subject change হলে chapter reset
                                $set('chapter_id', null);
                            })
                            ->helperText(fn ($get) => ! $get('class_id') ? 'Please select Class first.' : null),

                        // ✅ Chapter (depends on Class; narrows by Subject if selected)
                        Select::make('chapter_id')
                            ->label('Chapter')
                            ->options(function ($get) {
                                $classId = $get('class_id');
                                $subjectId = $get('subject_id');

                                if (! $classId) {
                                    return [];
                                }

                                // Chapter table এ subject_id আছে ধরে নেওয়া হলো (তোমার column অনুযায়ী)
                                $query = Chapter::query()
                                    ->whereHas('subject', function ($q) use ($classId) {
                                        $q->where('class_id', $classId);
                                    });

                                if ($subjectId) {
                                    $query->where('subject_id', $subjectId);
                                }

                                return $query
                                    ->orderBy('chapter_name')
                                    ->pluck('chapter_name', 'id')
                                    ->toArray();
                            })
                            ->preload()
                            ->searchable()
                            ->disabled(fn ($get) => ! $get('class_id'))
                            ->helperText(fn ($get) => ! $get('class_id') ? 'Please select Class first.' : null),
                    ])
                    ->query(function ($query, array $data) {
                        $classId   = $data['class_id'] ?? null;
                        $subjectId = $data['subject_id'] ?? null;
                        $chapterId = $data['chapter_id'] ?? null;

                        // ✅ Only Class selected
                        if ($classId) {
                            $query->whereHas('chapter.subject', function ($q) use ($classId) {
                                $q->where('class_id', $classId);
                            });
                        }

                        // ✅ Class + Subject selected
                        if ($subjectId) {
                            $query->whereHas('chapter', function ($q) use ($subjectId) {
                                $q->where('subject_id', $subjectId);
                            });
                        }

                        // ✅ Class + Subject + Chapter selected
                        // (বা Class + Chapter দিলে ও কাজ করবে)
                        if ($chapterId) {
                            $query->where('chapter_id', $chapterId);
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
