<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Forms\Components\Card;
use Filament\Tables;
use Forms\Components;


use Filament\Resources\Form;
use Filament\Resources\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;
use PHPUnit\Framework\Reorderable;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;


use Filament\Pages\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Filament\Forms\Components\TagsInput;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup=  'Employee Managment';
    protected static bool $shouldRegisterNavigation=true;

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->withoutGlobalScopes();
    }


    public static function form(Form $form): Form
    {
        $options=array();
        foreach (Role::all() as $role){
                 $options[$role->id]=$role->name;
        }

        return $form
        ->schema([

        Card::make()
            ->schema([
                TextInput::make('first_name')->required()
                    ->helperText('your first name here'),

            Forms\Components\TextInput::make('last_name')
            ->required()
            ->helperText('your last name here'),

            Forms\Components\TextInput::make('email')->unique(ignoreRecord: true)
            ->email(),

                TextInput::make('password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->hint('[Forgotten your password?](forgotten-password)'),


                Select::make('role_id')  ->options($options)->required()->label('role'),


            ])->columns(1),





            Card::make()
                ->schema([

                    Forms\Components\TextInput::make('position')
                        ->required(),

                    Forms\Components\TextInput::make('mobile')
                        ->required(),

                    TextInput::make('organizational_unit')->required(),

                    TextInput::make('competency_ranting')->required(),

                ])
                ->columns(3),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name'),
                Tables\Columns\TextColumn::make('last_name'),
                Tables\Columns\TextColumn::make('position'),
                Tables\Columns\TextColumn::make('deleted_at'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('mobile'),
                Tables\Columns\TextColumn::make('role.name')->label('role'),
                Tables\Columns\TextColumn::make('organizational_unit'),

            ])->defaultSort('first_name')
            ->filters([
                Tables\Filters\Filter::make('verified')
                ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at')),
                Tables\Filters\Filter::make('mobile null')
                ->query(fn (Builder $query): Builder => $query->whereNull('mobile')),

                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('activate')
                    ->action(fn (User $record) => $record->activate())
                    ->requiresConfirmation()
                    ->color('success'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->reorderable('first_name');


    }

    public static function getRelations(): array
    {
        return [
                RelationManagers\RoleRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
