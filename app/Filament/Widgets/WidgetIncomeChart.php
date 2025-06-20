<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Carbon;
use App\Models\Transaction;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class WidgetIncomeChart extends ChartWidget
{
    use InteractsWithPageFilters;
    protected static ?string $heading = 'Income';
    protected static string $color = 'success';
    protected function getData(): array
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

        // ===== MODIFIKASI 2: Tambahkan filter user_id pada query utama Trend =====
        $data = Trend::query(Transaction::incomes()->where('user_id', auth()->id()))
            ->dateColumn('date_transaction')
            ->between(
                start: $startDate,
                end: $endDate,
            )
            ->perDay()
            ->sum('amount');

        return [
            'datasets' => [
                [
                    'label' => 'Income',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}