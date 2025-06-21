<?php
namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromArray;

class TransactionsExport implements FromArray
{
    public function array(): array
    {
        $transactions = Transaction::with('category')->get();

        $data[] = [
            'ID', 'Nama', 'Kategori', 'Tanggal', 'Jumlah', 'Catatan', 'Dibuat Pada', 'Diperbarui Pada'
        ];

        foreach ($transactions as $trx) {
            $data[] = [
                $trx->id,
                $trx->name,
                optional($trx->category)->name ?? 'N/A',
                $trx->date_transaction,
                $trx->amount,
                $trx->note,
                $trx->created_at,
                $trx->updated_at,
            ];
        }

        return $data;
    }
}
