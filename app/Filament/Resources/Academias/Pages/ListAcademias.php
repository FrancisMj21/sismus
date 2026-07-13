<?php

namespace App\Filament\Resources\Academias\Pages;

use App\Filament\Resources\Academias\AcademiaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAcademias extends ListRecords
{
    protected static string $resource = AcademiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
