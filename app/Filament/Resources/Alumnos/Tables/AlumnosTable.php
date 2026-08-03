<?php

namespace App\Filament\Resources\Alumnos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AlumnosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('academia_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('codigo')
                    ->searchable(),
                TextColumn::make('dni')
                    ->searchable(),
                TextColumn::make('nombres')
                    ->searchable(),
                TextColumn::make('apellidos')
                    ->searchable(),
                TextColumn::make('fecha_nacimiento')
                    ->date()
                    ->sortable(),
                TextColumn::make('telefono')
                    ->searchable(),
                TextColumn::make('correo')
                    ->searchable(),
                TextColumn::make('direccion')
                    ->searchable(),
                TextColumn::make('contacto_emergencia')
                    ->searchable(),
                TextColumn::make('telefono_emergencia')
                    ->searchable(),
                TextColumn::make('fecha_registro')
                    ->date()
                    ->sortable(),
                IconColumn::make('activo')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
