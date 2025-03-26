<?php

namespace App\Filament\Resources;

use App\Enums\Role;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'پروفایل کاربری';
    protected static ?string $modelLabel = 'کاربر';

    public static function getNavigationLabel(): string
    {
        return in_array(
            User::find(auth()->id())->role,
            [
                Role::Editor->value,
                Role::Root->value,
            ]
        ) ? 'لیست کاربران' : static::$navigationLabel;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('bio'),
                TextInput::make('email')
                    ->email()
                    ->unique(ignoreRecord: true),
                TextInput::make('mobile')
                    ->email()
                    ->unique(ignoreRecord: true),
                Select::make('role')->options(function(){
                    $permision = in_array(
                        User::find(auth()->id())->role,
                        [
                            Role::Editor->value,
                            Role::Root->value,
                        ]
                        );
                    if($permision){
                        $result = [
                            Role::Teacher->value => 'مدرس',
                            Role::Student->value => 'دانشجو',
                        ];
                        if(auth()->user()->role == Role::Root->value){
                            $result += [
                                Role::Root->value => 'مدیر',
                                Role::Editor->value => 'ویرایشگر',
                            ];
                        }
                        return $result;
                    }
                    return null;
                })
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->color(function ($record){
                        if($record->id == auth()->id()) return 'success';
                    }),
                TextColumn::make('email')
                    ->color(function ($record){
                        if($record->id == auth()->id()) return 'success';
                    }),
                TextColumn::make('role')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        Role::Student->value => 'gray',
                        Role::Teacher->value => 'success',
                        Role::Editor->value => 'warning',
                        Role::Root->value => 'danger',
                    })

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
