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
        // ===== MODIFIKASI 1: Tambahkan filter user_id untuk mendapatkan tanggal pertama =====
        $firstDate = Transaction::where('user_id', auth()->id())
            ->orderBy('date_transaction')
            ->value('date_transaction');

        $startDate = isset($this->filters['startDate']) && $this->filters['startDate']
            ? Carbon::parse($this->filters['startDate'])
            : ($firstDate ? Carbon::parse($firstDate) : now()->startOfMonth());

        $endDate = isset($this->filters['endDate']) && $this->filters['endDate']
            ? Carbon::parse($this->filters['endDate'])
            : now();

        $range = $startDate->diffInDays($endDate);

        // Periode sebelumnya
        $previousStart = $startDate->copy()->subDays($range + 1);
        $previousEnd = $startDate->copy()->subDay();

        // ===== MODIFIKASI 2: Tambahkan filter user_id pada Pemasukan saat ini =====
        $currentIncome = Transaction::incomes()
            ->where('user_id', auth()->id())
            ->whereBetween('date_transaction', [$startDate, $endDate])
            ->sum('amount');

        // ===== MODIFIKASI 3: Tambahkan filter user_id pada Pemasukan sebelumnya =====
        $previousIncome = Transaction::incomes()
            ->where('user_id', auth()->id())
            ->whereBetween('date_transaction', [$previousStart, $previousEnd])
            ->sum('amount');

        // ===== MODIFIKASI 4: Tambahkan filter user_id pada Pengeluaran saat ini =====
        $currentExpense = Transaction::expenses()
            ->where('user_id', auth()->id())
            ->whereBetween('date_transaction', [$startDate, $endDate])
            ->sum('amount');

        // ===== MODIFIKASI 5: Tambahkan filter user_id pada Pengeluaran sebelumnya =====
        $previousExpense = Transaction::expenses()
            ->where('user_id', auth()->id())
            ->whereBetween('date_transaction', [$previousStart, $previousEnd])
            ->sum('amount');

        // Selisih
        $currentDiff = $currentIncome - $currentExpense;
        $previousDiff = $previousIncome - $previousExpense;

        // Fungsi format nominal
        $formatRupiah = fn($value) => 'Rp ' . number_format(abs($value), 2, ',', '.');

        // Hitung perbedaan
        $incomeDiff = $currentIncome - $previousIncome;
        $expenseDiff = $currentExpense - $previousExpense;
        $diffDiff = $currentDiff - $previousDiff;

        return [
        // Pemasukan
        Stat::make('Pemasukan', $formatRupiah($currentIncome))
            ->description(
                ($incomeDiff >= 0 ? '+' : '-') . $formatRupiah($incomeDiff) . ' ' . ($incomeDiff >= 0 ? 'increase' : 'decrease')
            )
            ->descriptionIcon($incomeDiff >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($incomeDiff >= 0 ? 'success' : 'danger'),

        // Pengeluaran
        Stat::make('Pengeluaran', $formatRupiah($currentExpense))
            ->description(
                ($expenseDiff >= 0 ? '+' : '-') . $formatRupiah($expenseDiff) . ' ' . ($expenseDiff >= 0 ? 'increase' : 'decrease')
            )
            ->descriptionIcon($expenseDiff >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($expenseDiff >= 0 ? 'danger' : 'success'), // ⬅️ Warna dibalik: naik = bahaya

        // Selisih
        Stat::make('Selisih', $formatRupiah($currentDiff))
            ->description(
                ($diffDiff >= 0 ? '+' : '-') . $formatRupiah($diffDiff) . ' ' . ($diffDiff >= 0 ? 'increase' : 'decrease')
            )
            ->descriptionIcon($diffDiff >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
            ->color($diffDiff >= 0 ? 'success' : 'danger'), // ⬅️ Positif jika naik
        ];

    }
}