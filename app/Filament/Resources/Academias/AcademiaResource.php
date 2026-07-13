<?php

namespace App\Filament\Resources\Academias;

use App\Filament\Resources\Academias\Pages\CreateAcademia;
use App\Filament\Resources\Academias\Pages\EditAcademia;
use App\Filament\Resources\Academias\Pages\ListAcademias;
use App\Filament\Resources\Academias\Schemas\AcademiaForm;
use App\Filament\Resources\Academias\Tables\AcademiasTable;
use App\Models\Academia;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AcademiaResource extends Resource
{
    protected static ?string $model = Academia::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nombre';

    public static function form(Schema $schema): Schema
    {
        return AcademiaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademiasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAcademias::route('/'),
            'create' => CreateAcademia::route('/create'),
            'edit' => EditAcademia::route('/{record}/edit'),
        ];
    }
}
