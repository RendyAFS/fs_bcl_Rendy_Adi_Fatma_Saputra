<?php

namespace App\Filament\Resources\FleetBookingResource\Pages;

use App\Filament\Resources\FleetBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFleetBookings extends ListRecords
{
    protected static string $resource = FleetBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
