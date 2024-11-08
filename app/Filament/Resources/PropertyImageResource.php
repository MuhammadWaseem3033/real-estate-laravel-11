<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyImageResource\Pages;
use App\Filament\Resources\PropertyImageResource\RelationManagers;
use App\Models\PropertyImage;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PropertyImageResource extends Resource
{
    protected static ?string $model = PropertyImage::class;

    protected static ?string $navigationIcon = 'heroicon-s-photo';

    protected static ?string $navigationGroup = 'Properties';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        // dd(request()->all());
        return $form
            ->schema([
                Select::make('property_listing_id')
                    ->relationship('property', 'title')
                    ->required(),

                FileUpload::make('image')
                    ->multiple()
                    ->panelLayout('grid')
                    // ->reorderable()
                    ->maxSize(1024)
                    ->minFiles(1)
                    ->maxFiles(6)
                    ->disk('public')
                    ->directory('Property/images')              
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('property.title'),
                ImageColumn::make('image')
                    ->label('Preview')
                    ->circular()
                    // ->stacked()
                    ->limit(2)
                    ->limitedRemainingText(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPropertyImages::route('/'),
            'create' => Pages\CreatePropertyImage::route('/create'),
            'edit' => Pages\EditPropertyImage::route('/{record}/edit'),
        ];
    }
}
