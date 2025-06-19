<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Carbon;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        // Middleware to allow only admin access
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role !== 'admin') {
                abort(403, 'Unauthorized');
            }
            return $next($request);
        });
    }

   public function index()
{
    $totalUsers = User::userRole()->count();
    $users = User::userRole()->get(); 

    $totalTransactions = Transaction::count();

    $totalIncome = Transaction::incomes()->sum('amount');
    $totalExpense = Transaction::expenses()->sum('amount');
    $totalBalance = $totalIncome - $totalExpense;

    // Data grafik: 30 hari terakhir
    $dates = collect(range(0, 29))->map(function ($i) {
        return Carbon::today()->subDays($i)->format('d M');
    })->reverse()->values();

    $incomes = [];
    $expenses = [];

    foreach ($dates as $dateLabel) {
        $date = Carbon::createFromFormat('d M', $dateLabel)->format('Y-m-d');

        $income = Transaction::incomes()->whereDate('date_transaction', $date)->sum('amount');
        $expense = Transaction::expenses()->whereDate('date_transaction', $date)->sum('amount');

        $incomes[] = $income;
        $expenses[] = $expense;
    }

    return view('dashboard', compact(
        'totalUsers',
        'totalTransactions',
        'totalIncome',
        'totalExpense',
        'totalBalance',
        'dates',
        'incomes',
        'expenses',
        'users' // Tambahkan data users ke view
    ));
}

}
