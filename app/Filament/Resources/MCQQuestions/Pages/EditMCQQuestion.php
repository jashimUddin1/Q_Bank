<?php

namespace App\Filament\Resources\MCQQuestions\Pages;

use App\Filament\Resources\MCQQuestions\MCQQuestionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMCQQuestion extends EditRecord
{
    protected static string $resource = MCQQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
{
    if (empty($data['proviking_img'])) {
        $data['proviking_img'] = $this->record->proviking_img;
    }

    return $data;
}

}
