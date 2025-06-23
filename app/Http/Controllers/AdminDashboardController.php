<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

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

     // 🔥 Tambahkan ini: Ambil pesan dari file JSON
    $messages = [];
    if (Storage::exists('contact_messages.json')) {
        $messages = json_decode(Storage::get('contact_messages.json'), true);
    }

    return view('dashboard', [
    'totalUsers'        => $totalUsers,
    'totalTransactions' => $totalTransactions,
    'totalIncome'       => $totalIncome,
    'totalExpense'      => $totalExpense,
    'totalBalance'      => $totalBalance,
    'dates'             => $dates,
    'incomes'           => $incomes,
    'expenses'          => $expenses,
    'users'             => $users,
    'messages'          => $messages,
]);

}

public function toggleUserStatus(User $user)
{
    $user->is_active = !$user->is_active;
    $user->save();

    return redirect()->back()->with('status', 'Status akun berhasil diperbarui.');
}


}
