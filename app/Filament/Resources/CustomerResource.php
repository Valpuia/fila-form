<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\Tabs::make('Heading')
                //     ->tabs([
                //         Forms\Components\Tabs\Tab::make('Label 1')
                //             ->schema([
                //                 Forms\Components\TextInput::make('name')
                //                     ->required()
                //                     ->maxLength(255),
                //                 Forms\Components\TextInput::make('email')
                //                     ->email()
                //                     ->required()
                //                     ->maxLength(255),
                //             ]),
                //         Forms\Components\Tabs\Tab::make('Label 2')
                //             ->schema([
                //                 Forms\Components\TextInput::make('photo')
                //                     ->required()
                //                     ->maxLength(255),
                //                 Forms\Components\TextInput::make('gender')
                //                     ->required()
                //                     ->maxLength(255),
                //             ]),
                //         Forms\Components\Tabs\Tab::make('Label 3')
                //             ->schema([
                //                 Forms\Components\TextInput::make('phone')
                //                     ->required()
                //                     ->tel()
                //                     ->maxLength(255),
                //                 Forms\Components\DatePicker::make('birthday')
                //                     ->required(),
                //             ]),
                //     ])
                //     ->columnSpanFull(),

                // Forms\Components\Wizard::make([
                //     Forms\Components\Wizard\Step::make('Order')
                //         ->schema([
                //             // ...
                //         ]),
                //     Forms\Components\Wizard\Step::make('Delivery')
                //         ->schema([
                //             // ...
                //         ]),
                //     Forms\Components\Wizard\Step::make('Billing')
                //         ->schema([
                //             // ...
                //         ]),
                // ]),

                Forms\Components\Section::make('Heading')
                    ->description('Description')
                    ->aside()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                    ])
                    // ->collapsible()
                    ->compact()
                    ->collapsed()
                    ->columns(2),

                Forms\Components\Placeholder::make('Label')
                    ->content('Content, displayed underneath the label'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('photo'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('birthday')
                    ->date(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
