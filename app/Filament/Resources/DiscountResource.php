<?php

namespace App\Filament\Resources;

use App\Enums\Role;
use App\Filament\Resources\DiscountResource\Pages;
use App\Filament\Resources\DiscountResource\RelationManagers;
use App\Models\Discount;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;
    protected static ?string $modelLabel = 'کد تخفیف';
    protected static ?string $navigationLabel = 'کد تخفیف';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('code')->required()
                    ->label('کد تخفیف'),
                TextInput::make('count')
                    ->step('1')
                    ->numeric()
                    ->required(),
                TextInput::make('discount')
                    ->label('درصد تخفیف')
                    ->step(1)
                    ->minValue(1)
                    ->maxValue(100)
                    ->required()
                    ->numeric()
                    ->minValue('1'),
                Checkbox::make('status')->label('فعال'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code'),
                TextColumn::make('count'),
                TextColumn::make('discount'),
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
        // 'filament.panel.resources.discounts.index'
        // in_array(
        //     User::find(auth()->id())->role,
        //     [
        //         Role::Editor->value,
        //         Role::Root->value,
        //     ]
        // ) ? 'دوره ها' : static::$navigationLabel;
        return [
            'index' => Pages\ListDiscounts::route('/'),
            'create' => Pages\CreateDiscount::route('/create'),
            'edit' => Pages\EditDiscount::route('/{record}/edit'),
        ];
    }
    public static function shouldRegisterNavigation(): bool
    {
        return in_array(
                User::find(auth()->id())->role,
                [
                    Role::Editor->value,
                    Role::Root->value,
                ]
                );

    }
}
