<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Exports\TransactionsExport;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\TransactionResource;
use Maatwebsite\Excel\Facades\Excel;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Export Excel')
                ->label('Export Excel')
                ->color('success')
                ->icon('heroicon-m-arrow-down-tray')
                ->action(fn () => Excel::download(new TransactionsExport, 'transactions.xlsx')),

            Action::make('Export PDF')
                ->label('Export PDF')
                ->color('danger')
                ->icon('heroicon-m-document-text')
                ->url(route('transactions.export.pdf'), shouldOpenInNewTab: true),

            Action::make('New Transactions')
                ->label('New Transactions')
                ->color('primary')
                ->icon('heroicon-m-plus')
                ->url('/user/transactions/create'),
        ];
    }
}
