<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    // use CreateRecord\Concerns\HasWizard;

    protected static string $resource = CustomerResource::class;

    // protected function getSteps(): array
    // {
    //     return [
    //         Step::make('Name')
    //             ->description('Give the category a clear and unique name, if it\'s too long then wondering how it will display')
    //             // ->icon('heroicon-o-shopping-bag')
    //             ->schema([
    //                 TextInput::make('name')
    //                     ->required()
    //                     ->maxLength(255),
    //                 TextInput::make('email')
    //                     ->email()
    //                     ->required()
    //                     ->maxLength(255),
    //             ]),
    //         Step::make('Description')
    //             ->description('Add some extra details')
    //             ->schema([
    //                 TextInput::make('photo')
    //                     ->required()
    //                     ->maxLength(255),
    //                 TextInput::make('gender')
    //                     ->required()
    //                     ->maxLength(255),
    //             ]),
    //         Step::make('Visibility')
    //             ->description('Control who can view it')
    //             ->schema([
    //                 TextInput::make('phone')
    //                     ->required()
    //                     ->tel()
    //                     ->maxLength(255),
    //                 DatePicker::make('birthday')
    //                     ->required(),
    //             ]),
    //     ];
    // }

    // public function hasSkippableSteps(): bool
    // {
    //     return true;
    // }
}
