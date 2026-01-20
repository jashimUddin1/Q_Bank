<?php

namespace App\Filament\Resources\Cqs\Pages;

use App\Filament\Resources\Cqs\CqResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCq extends EditRecord
{
    protected static string $resource = CqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
