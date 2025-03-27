<?php

namespace App\Filament\Resources;

use App\Enums\Role;
use App\Enums\Status;
use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $modelLabel = 'دوره ها';

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';
    protected static ?string $navigationLabel = 'دوره های من';

    public static function getNavigationLabel(): string
    {
        return in_array(
            User::find(auth()->id())->role,
            [
                Role::Editor->value,
                Role::Root->value,
            ]
        ) ? 'دوره ها' : static::$navigationLabel;
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name') ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $set('slug', Str::slug(str_replace(' ','-',$state)));
                    })
                    ->required(),
                TextInput::make('slug')->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('price'),
                RichEditor::make('description')->columnSpan('full'),
                Section::make('Publishing')
                    ->description('Settings for publishing this post.')
                    ->schema([
                        Select::make('status')
                            ->options([
                                Status::Don->value => 'به اتمام رسیده',
                                Status::InProgres->value => 'در حال ضبط',
                                Status::Stop->value => 'منقضی شده',
                                Status::Draft->value => 'در حال بررسی',
                            ]),
                        DateTimePicker::make('published_at'),
                    ])->columnSpan(1),
                FileUpload::make('file')
                    ->disk('public')
                    ->directory('form-attachments')
                    // ->visibility('private')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(self::getFilteredQuery())
            ->columns([
                ImageColumn::make('file')
                    // ->disk('local')
                    ->height(200)
                    ->width(200)->circular(),
                TextColumn::make('name')
                    ->description(fn (Product $record): string|null => $record->bio)
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('published_at')
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(function ($state,$record){
                        // if($record->published_at > date('m/d/y,h:m:sa')) return 'info';

                        if ($state === Status::Don && $record->published_at < now()) {
                            return 'success'; // سبز
                        } elseif ($state === Status::Don) {
                            return 'info'; // قرمز اگر زمان هنوز نرسیده باشد
                        }

                        // سایر وضعیت‌ها
                        return match ($state) {
                            Status::Draft => 'gray',
                            Status::InProgres => 'warning',
                            Status::Stop => 'danger',
                            default => 'gray',
                        };
                    })
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->sortable(),
                // TextColumn::make('bio')

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

    protected static function getFilteredQuery(): Builder
    {
        $user = auth()->user();

        return match ($user->role) {
            Role::Student->value => self::getStudentCoursesQuery($user->id),
            Role::Teacher->value => Product::query()->where('user_id', $user->id),
            Role::Editor->value  => Product::query(),
            Role::Root->value  => Product::query(),
            // default   => Product::query()->whereNull('id'), // No courses for unknown roles
        };
    }
    protected static function getStudentCoursesQuery(int $userId): Builder
    {
        return Product::query()
            ->whereIn('id', function ($query) use ($userId) {
                $query->select('product_id')
                    ->from('order_items')
                    ->join('orders', 'order_items.order_id', '=', 'orders.id')
                    ->where('orders.user_id', $userId);
            });
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
