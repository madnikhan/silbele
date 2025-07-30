<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Shop Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Product')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Basic Information')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                Forms\Components\Select::make('category_id')
                                    ->label('Category')
                                    ->options(Category::active()->ordered()->pluck('name', 'id'))
                                    ->required()
                                    ->searchable(),

                                Forms\Components\TextInput::make('sku')
                                    ->label('SKU')
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                Forms\Components\TextInput::make('size')
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('stock_quantity')
                                    ->numeric()
                                    ->default(0)
                                    ->label('Stock Quantity'),

                                Forms\Components\TextInput::make('price')
                                    ->required()
                                    ->numeric()
                                    ->prefix('£')
                                    ->label('Price'),

                                Forms\Components\TextInput::make('compare_price')
                                    ->numeric()
                                    ->prefix('£')
                                    ->label('Compare Price (Original Price)'),

                                Forms\Components\Textarea::make('short_description')
                                    ->maxLength(255)
                                    ->rows(3),

                                Forms\Components\RichEditor::make('description')
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Images')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->directory('products')
                                    ->label('Main Image')
                                    ->columnSpanFull(),

                                Forms\Components\FileUpload::make('gallery')
                                    ->multiple()
                                    ->image()
                                    ->directory('products/gallery')
                                    ->label('Product Gallery')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Product Details')
                            ->schema([
                                Forms\Components\TextInput::make('skin_type')
                                    ->maxLength(255)
                                    ->label('Skin Type'),

                                Forms\Components\TextInput::make('concern')
                                    ->maxLength(255)
                                    ->label('Skin Concern'),

                                Forms\Components\Repeater::make('ingredients')
                                    ->schema([
                                        Forms\Components\TextInput::make('ingredient')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->label('Ingredients')
                                    ->columnSpanFull(),

                                Forms\Components\Repeater::make('benefits')
                                    ->schema([
                                        Forms\Components\TextInput::make('benefit')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->label('Benefits')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),

                        Forms\Components\Tabs\Tab::make('Settings')
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),

                                Forms\Components\Toggle::make('is_featured')
                                    ->label('Featured Product'),

                                Forms\Components\Toggle::make('is_bestseller')
                                    ->label('Bestseller'),

                                Forms\Components\TextInput::make('rating')
                                    ->numeric()
                                    ->step(0.01)
                                    ->minValue(0)
                                    ->maxValue(5)
                                    ->default(0),

                                Forms\Components\TextInput::make('review_count')
                                    ->numeric()
                                    ->default(0)
                                    ->label('Review Count'),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->size(40),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('category.name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('price')
                    ->money('GBP')
                    ->sortable(),

                Tables\Columns\TextColumn::make('compare_price')
                    ->money('GBP')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('stock_quantity')
                    ->numeric()
                    ->sortable()
                    ->label('Stock'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_bestseller')
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('rating')
                    ->numeric(
                        decimalPlaces: 1,
                        decimalSeparator: '.',
                        thousandsSeparator: ',',
                    )
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Category')
                    ->options(Category::active()->ordered()->pluck('name', 'id')),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured'),
                Tables\Filters\TernaryFilter::make('is_bestseller')
                    ->label('Bestseller'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
