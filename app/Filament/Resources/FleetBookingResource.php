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
                Forms\Components\Select::make('customer_id')
                    ->label('Customer')
                    ->relationship('customer', 'name') // pastikan relasi `customer()` ada di model
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\Select::make('vehicle_type_id')
                    ->label('Tipe Armada')
                    ->relationship('vehicleType', 'name') // relasi vehicleType()
                    ->searchable()
                    ->preload()
                    ->required()
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
                Forms\Components\Select::make('origin_location_id')
                    ->label('Lokasi Asal')
                    ->relationship('originLocation', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\Select::make('destination_location_id')
                    ->label('Lokasi Tujuan')
                    ->relationship('destinationLocation', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

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

            // Menampilkan nama customer dari ID
            Tables\Columns\TextColumn::make('customer.company_name')
                ->label('Customer')
                ->sortable(),

            // Menampilkan nama tipe kendaraan dari ID
            Tables\Columns\TextColumn::make('vehicleType.name')
                ->label('Tipe Armada')
                ->sortable(),

            // Menampilkan tanggal pemesanan
            Tables\Columns\TextColumn::make('booking_date')
                ->date()
                ->sortable(),

            // Menampilkan tanggal mulai
            Tables\Columns\TextColumn::make('start_date')
                ->dateTime()
                ->sortable(),

            // Menampilkan tanggal akhir
            Tables\Columns\TextColumn::make('end_date')
                ->dateTime()
                ->sortable(),

            // Menampilkan lokasi asal berdasarkan ID
            Tables\Columns\TextColumn::make('originLocation.name')
                ->label('Lokasi Asal')
                ->sortable(),

            // Menampilkan lokasi tujuan berdasarkan ID
            Tables\Columns\TextColumn::make('destinationLocation.name')
                ->label('Lokasi Tujuan')
                ->sortable(),

            Tables\Columns\TextColumn::make('cargo_weight')
                ->numeric()
                ->sortable(),

            Tables\Columns\TextColumn::make('status')
                ->sortable(),

            // Tanggal pembuatan
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            // Tanggal update
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
