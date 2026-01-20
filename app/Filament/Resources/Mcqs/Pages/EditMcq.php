<?php

namespace App\Filament\Resources\Mcqs\Pages;

use App\Filament\Resources\Mcqs\McqResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMcq extends EditRecord
{
    protected static string $resource = McqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
