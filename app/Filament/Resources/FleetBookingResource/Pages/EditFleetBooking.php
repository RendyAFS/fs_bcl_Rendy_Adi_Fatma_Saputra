<?php

namespace App\Filament\Resources\FleetBookingResource\Pages;

use App\Filament\Resources\FleetBookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFleetBooking extends EditRecord
{
    protected static string $resource = FleetBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
