<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Carbon; 
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;
    protected function getStats(): array
    {
        
        $firstDate = Transaction::orderBy('date_transaction')->value('date_transaction');

        $startDate = isset($this->filters['startDate']) && $this->filters['startDate']
            ? Carbon::parse($this->filters['startDate'])
            : ($firstDate ? Carbon::parse($firstDate) : now()->startOfMonth());

        $endDate = isset($this->filters['endDate']) && $this->filters['endDate']
            ? Carbon::parse($this->filters['endDate'])
            : now();

        $pemasukan = Transaction::incomes()
        ->whereBetween('date_transaction', [$startDate, $endDate])
        ->sum('amount');
        $pengeluaran = Transaction::expenses()
        ->whereBetween('date_transaction', [$startDate, $endDate])
        ->sum('amount');

     return [
        Stat::make('Pemasukan', 'Rp ' . number_format($pemasukan, 2, ',', '.'))
            ->description('32k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        Stat::make('Pengeluaran', 'Rp ' . number_format($pengeluaran, 2, ',', '.'))
            ->description('7% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger'),
        Stat::make('Selisih', 'Rp ' . number_format($pemasukan - $pengeluaran, 2, ',', '.'))    
            ->description('3% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
    ];
    }
}
