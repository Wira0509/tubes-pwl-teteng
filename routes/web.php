<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\TransactionExportController;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReminderController;

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::get('/ourteam', function(){
    return view('ourteam');
})->name('ourteam');

Route::get('/login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::get('/admin/login', function () {
    return redirect('/login'); // atau abort(404);
});

Route::get('/transactions/export/pdf', [TransactionExportController::class, 'exportPdf'])->name('transactions.export.pdf');


require __DIR__.'/auth.php';

Route::get('/debug/users', function () {
    $users = User::where('role', 'user')->get();
    return $users;
});

Route::get('/avatar/{user}', function (User $user) {
    $path = storage_path('app/private/' . $user->avatar_url);

    if (!file_exists($path)) {
        abort(404, 'Avatar file not found: ' . $path);
    }

    return response()->file($path);
})->middleware('web')->name('avatar.view');

Route::post('/admin/user/{user}/toggle', [App\Http\Controllers\AdminDashboardController::class, 'toggleUserStatus'])
    ->name('admin.toggle-user');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/admin/messages', [ContactController::class, 'adminView'])->name('admin.messages');

Route::get('/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');



