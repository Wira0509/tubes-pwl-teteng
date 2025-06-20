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

        $firstDate = Transaction::orderBy('date_transaction')->value('date_transaction');

        $startDate = isset($this->filters['startDate']) && $this->filters['startDate']
            ? Carbon::parse($this->filters['startDate'])
            : ($firstDate ? Carbon::parse($firstDate) : now()->startOfMonth());

        $endDate = isset($this->filters['endDate']) && $this->filters['endDate']
            ? Carbon::parse($this->filters['endDate'])
            : now();

          $data = Trend::query(Transaction::incomes())
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
