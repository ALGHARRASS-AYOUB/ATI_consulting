<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResponsabilityResource\Pages;
use App\Filament\Resources\ResponsabilityResource\RelationManagers;
use App\Models\Responsability;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResponsabilityResource extends Resource
{
    protected static ?string $model = Responsability::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup=  'Employee Managment';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('hire_date')
                    ->required(),
                Forms\Components\TextInput::make('project_assignment')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('job_description')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('hire_date')
                    ->date(),
                Tables\Columns\TextColumn::make('project_assignment'),
                Tables\Columns\TextColumn::make('job_description'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListResponsabilities::route('/'),
            'create' => Pages\CreateResponsability::route('/create'),
            'edit' => Pages\EditResponsability::route('/{record}/edit'),
        ];
    }
}
