<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FleetBookingResource\Pages;
use App\Filament\Resources\FleetBookingResource\RelationManagers;
use App\Models\FleetBooking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FleetBookingResource extends Resource
{
    protected static ?string $model = FleetBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('booking_number')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('customer_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('vehicle_type_id')
                    ->required()
                    ->numeric()
                    ->rule(function () {
                        return function (string $attribute, $value, \Closure $fail) {
                            $isBooked = \App\Models\FleetBooking::where('vehicle_type_id', $value)
                                ->where('status', '!=', 'selesai')
                                ->exists();

                            if ($isBooked) {
                                $fail("Armada sedang digunakan.");
                            }
                        };
                    }),
                Forms\Components\DatePicker::make('booking_date')
                    ->required()
                    ->rule('after_or_equal:today'),
                Forms\Components\DateTimePicker::make('start_date')
                    ->required()
                    ->rule('after_or_equal:today'),
                Forms\Components\DateTimePicker::make('end_date')
                    ->required()
                    ->rule('after:start_date'),
                Forms\Components\TextInput::make('origin_location_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('destination_location_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('cargo_description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('cargo_weight')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\Textarea::make('notes')
                    ->nullable()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('booking_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vehicle_type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('booking_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('origin_location_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('destination_location_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cargo_weight')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListFleetBookings::route('/'),
            'create' => Pages\CreateFleetBooking::route('/create'),
            'view' => Pages\ViewFleetBooking::route('/{record}'),
            'edit' => Pages\EditFleetBooking::route('/{record}/edit'),
        ];
    }
}
