<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyListingResource\Pages;
use App\Models\PropertyListing;
use App\Models\PropertyType;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\search;

class PropertyListingResource extends Resource
{
    protected static ?string $model = PropertyListing::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Properties';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Titles Section')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->minLength(30)
                            ->maxLength(60),
                        TextInput::make('meta_title')
                            ->minLength(30)
                            ->maxLength(80)
                            ->required(),

                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('PKR'),
                        TextInput::make('bedrooms')
                            ->numeric()
                            ->minValue(1)
                            ->required(),
                        TextInput::make('bathrooms')
                            ->numeric()
                            ->minValue(1)
                            ->required(),
                        TextInput::make('area_sqft')
                            ->numeric()
                            ->required(),
                        TextInput::make('location')
                            ->required(),
                    ])->columnSpan(1),

                Section::make('Relationship Section')
                    ->schema([
                        Select::make('cat_id')
                            ->relationship('category', 'name')
                            ->required(),

                        Select::make('property_type_id')
                            ->relationship('propertyType', 'name')
                            ->required(),

                        Select::make('featured_id')
                            ->relationship('propertyFeature', 'name')
                            ->required(),

                        Select::make('status')
                            ->required()
                            ->options([
                                'for_sale' => 'For Sale',
                                'for_rent' => 'For Rent',
                                'sold' => 'Sold',
                                'rented' => 'Rented',
                            ]),

                        TextInput::make('year_built')
                            ->required()
                            ->numeric()
                            ->minValue(1800)
                            ->maxValue(date('Y'))
                            ->label('Year Built'),
                        DatePicker::make('list_date')
                            ->required(),
                        DatePicker::make('sold_date')
                            ->required(),

                    ])->columnSpan(1),


                Section::make('Description Section')
                    ->schema([
                        MarkdownEditor::make('description')
                            ->required()
                            ->minLength(2)
                            ->maxLength(1500),
                        MarkdownEditor::make('meta_description')
                            ->minLength(2)
                            ->maxLength(200),
                    ])->columnSpan(1),



                Section::make()->schema([
                    FileUpload::make('image')
                        ->disk('public')
                        ->directory('Property/images')
                        ->required()
                        ->minSize(100)
                        ->maxSize(1024),

                    FileUpload::make('video')
                        ->disk('public')
                        ->directory('Property/videos'),
                    Toggle::make('published')
                        ->minSize(100) ,
                ])->columnSpan(1),




                // ->relationship('propertyStatus', 'name')
                // ->required(),

                // Select::make('agent_id')
                //     ->relationship('agent', 'name')
                //     ->required(),

                TextInput::make('user_id')
                    ->default(fn() => Auth::id())
                    // ->disabled()
                    ->hidden(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->circular()
                    ->toggleable()
                    ->sortable(),
                ImageColumn::make('video')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable()
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('meta_title')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('price')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('status')
                    ->color(fn(string $state): string => match ($state) {
                        'for_sale' => 'gray',
                        'for_rent' => 'warning',
                        'sold' => 'success',
                        'rented' => 'danger',
                    })
                    ->toggleable()
                    ->sortable(),
                ToggleColumn::make('published')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('bedrooms')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('bathrooms')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('area_sqft')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('location')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('year_built')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('list_date')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('sold_date')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('agent.name')
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('propertyFeature.name')
                    ->toggleable()
                    ->sortable(),
                TextColumn::make('propertyType.name')
                    ->toggleable()
                    ->sortable(),

                TextColumn::make('meta_description')
                    ->toggleable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('description')
                    ->toggleable()
                    ->sortable()
                    ->limit(100),
                TextColumn::make('created_at')
                    ->toggleable()
                    ->sortable()
                    ->dateTime(),
            ])
            ->filters([
                Filter::make('published')
                    ->toggle(),
                SelectFilter::make('property_type_id')
                    ->options(fn(): array => PropertyType::query()->pluck('name', 'id')->all()),

                SelectFilter::make('status')
                    ->options([
                        'for_sale' => 'For Sale',
                        'for_rent' => 'For Rent',
                        'sold' => 'Sold',
                        'rented' => 'Rented',
                    ])
            ])
            ->filtersTriggerAction(
                fn(Action $action) => $action
                    ->button()

                    ->label('Filter'),
            )
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
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
            'index' => Pages\ListPropertyListings::route('/'),
            'create' => Pages\CreatePropertyListing::route('/create'),
            'edit' => Pages\EditPropertyListing::route('/{record}/edit'),
        ];
    }
}
