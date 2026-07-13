<?php

namespace App\Filament\Resources\Academias\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AcademiaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required(),
                TextInput::make('ruc'),
                TextInput::make('telefono')
                    ->tel(),
                TextInput::make('correo'),
                TextInput::make('direccion'),
                TextInput::make('logo'),
                Toggle::make('activo'),
            ]);
    }
}
