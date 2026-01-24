<?php

namespace App\Filament\Resources\Chapters\Tables;

use App\Models\AcademicClass;
use App\Models\Subject;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class ChaptersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('subject.academicClass.name')
                    ->label('Class')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('subject.sub_name')
                    ->label('Subject')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('chapter_name')
                    ->label('Chapter Name')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Filter::make('class_subject')
                    ->label('Filters')
                    ->schema([
                        Select::make('class_id')
                            ->label('Class')
                            ->options(AcademicClass::query()->pluck('name', 'id')->toArray())
                            ->preload()
                            ->live()
                            ->afterStateUpdated(fn ($set) => $set('subject_id', null)),

                        Select::make('subject_id')
                            ->label('Subject')
                            ->options(function ($get) {
                                $classId = $get('class_id');

                                if (! $classId) {
                                    return [];
                                }

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

                        if ($classId) {
                            $query->whereHas('subject', fn ($q) => $q->where('class_id', $classId));
                        }

                        if ($subjectId) {
                            $query->where('subject_id', $subjectId);
                        }
                    }),
            ])
            // ->deferFilters(false)
            ->filtersApplyAction(fn ($action) => $action->label('Apply Now'))
            ->filtersLayout(FiltersLayout::BeforeContent)
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
