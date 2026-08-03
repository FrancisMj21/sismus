<?php

namespace App\Filament\Resources\Alumnos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AlumnoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('codigo'),
                TextInput::make('dni')
                    ->label('DNI')
                    ->length(8)
                    ->numeric()
                    ->required(),
                TextInput::make('nombres')
                    ->required()
                    ->maxLength(100),
                TextInput::make('apellidos')
                    ->required()
                    ->maxLength(100),
                DatePicker::make('fecha_nacimiento'),
                TextInput::make('telefono')
                    ->tel(),
                TextInput::make('correo')
                    ->label('Correo electrónico')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('direccion'),
                TextInput::make('contacto_emergencia'),
                TextInput::make('telefono_emergencia')
                    ->tel(),
                DatePicker::make('fecha_registro'),
                Textarea::make('observaciones')
                    ->columnSpanFull(),
                Toggle::make('activo'),
            ]);
    }
}
