<?php

namespace App\Filament\Resources\Academias\Pages;

use App\Filament\Resources\Academias\AcademiaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAcademia extends EditRecord
{
    protected static string $resource = AcademiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
