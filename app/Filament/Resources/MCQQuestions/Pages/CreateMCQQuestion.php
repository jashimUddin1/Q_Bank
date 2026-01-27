<?php

namespace App\Filament\Resources\MCQQuestions\Pages;

use App\Filament\Resources\MCQQuestions\MCQQuestionResource;
use Filament\Resources\Pages\CreateRecord;

use Illuminate\Contracts\Support\Htmlable;



class CreateMCQQuestion extends CreateRecord
{
    protected static string $resource = MCQQuestionResource::class;

    public function getTitle(): string | Htmlable
{
    return __('Add MCQ');
}

}
