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

    $days = $startDate->diffInDays($endDate) + 1;

    $previousStart = $startDate->copy()->subDays($days);
    $previousEnd = $endDate->copy()->subDays($days);

    // Sekarang
    $pemasukan = Transaction::incomes()->whereBetween('date_transaction', [$startDate, $endDate])->sum('amount');
    $pengeluaran = Transaction::expenses()->whereBetween('date_transaction', [$startDate, $endDate])->sum('amount');

    // Sebelumnya
    $pemasukanBefore = Transaction::incomes()->whereBetween('date_transaction', [$previousStart, $previousEnd])->sum('amount');

    // % pertumbuhan pemasukan dibanding sebelumnya
    $pemasukanGrowth = $pemasukanBefore > 0
        ? (($pemasukan - $pemasukanBefore) / $pemasukanBefore) * 100
        : 100;

    // % pengeluaran dari pemasukan
    $pengeluaranRatio = $pemasukan > 0
        ? ($pengeluaran / $pemasukan) * 100
        : 0;

    return [
        Stat::make('Pemasukan', 'Rp ' . number_format($pemasukan, 0, ',', '.'))
            ->description(number_format($pemasukanGrowth, 1) . '% dari sebelumnya')
            ->descriptionIcon($pemasukanGrowth >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($pemasukanGrowth >= 0 ? 'success' : 'danger'),

        Stat::make('Pengeluaran', 'Rp ' . number_format($pengeluaran, 0, ',', '.'))
            ->description(number_format($pengeluaranRatio, 1) . '% dari pemasukan')
            ->descriptionIcon('heroicon-m-scale')
            ->color('warning'),

        Stat::make('Selisih', 'Rp ' . number_format($pemasukan - $pengeluaran, 0, ',', '.'))
        ->descriptionIcon('heroicon-m-arrow-trending-up')
        ->color('success'),
];

    }
}