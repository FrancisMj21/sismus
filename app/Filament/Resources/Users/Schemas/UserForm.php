<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\Academia;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserForm
{
    public static function configure(Schema $schema): Schema
{
    return $schema
        ->components([

            Section::make('Información Personal')
                ->schema([

                    TextInput::make('name')
                        ->label('Nombre')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),

                    TextInput::make('telefono')
                        ->tel()
                        ->maxLength(20),

                ])
                ->columns(2),

            Section::make('Seguridad')
                ->schema([

                    TextInput::make('password')
                        ->label('Contraseña')
                        ->password()
                        ->revealable()
                        ->required(fn (string $operation) => $operation === 'create')
                        ->dehydrated(fn ($state) => filled($state))
                        ->rule(Password::defaults()),

                    Toggle::make('activo')
                        ->label('Activo')
                        ->default(true),

                ])
                ->columns(2),
                
            Select::make('role')
                ->label('Rol')
                ->options(function () {
                    if (auth()->user()->hasRole('Superadmin')) {
                        return Role::whereIn('name', [
                            'Administrador',
                            'Profesor',
                            'Recepcionista',
                        ])->pluck('name', 'name');
                    }

                    return Role::whereIn('name', [
                        'Profesor',
                        'Recepcionista',
                    ])->pluck('name', 'name');
                })
                
                ->searchable()
                ->required()
                ->dehydrated(false),

            Section::make('Academia')
                ->schema([

                    Select::make('academia_id')
                        ->label('Academia')
                        ->relationship('academia', 'nombre')
                        ->searchable()
                        ->preload()
                        ->required(),

                ]),

        ]);
    }
}
