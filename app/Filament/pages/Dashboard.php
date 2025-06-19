<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    use BaseDashboard\Concerns\HasFiltersForm;

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
            ->schema([
                 DatePicker::make('startDate')
                ->label('Tanggal Mulai')
                ->native(false) // Gunakan Flatpickr, bukan native browser datepicker
                ->displayFormat('d F Y') // Tampilkan: 18 Juni 2025
                ->maxDate(fn (Get $get) => $get('endDate') ?: now()),

                DatePicker::make('endDate')
                ->label('Tanggal Selesai')
                ->native(false)
                ->displayFormat('d F Y')
                ->minDate(fn (Get $get) => $get('startDate') ?: now())
                ->maxDate(now()),

                    ])
                    ->columns(2),
            ]);
    }
}