<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionExportController extends Controller
{
    public function exportPdf()
    {
        $transactions = Transaction::with('category')->get();
        $pdf = Pdf::loadView('transaction-pdf', compact('transactions'));
        return $pdf->download('transactions.export.pdf');
    }
}