<?php

namespace App\Providers;

use App\Models\Reminder;
use App\Notifications\ReminderDueNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Jalankan hanya saat user login
        if (Auth::check()) {
            $user = Auth::user();

            $reminders = Reminder::where('user_id', $user->id)
                ->whereDate('due_date', '<=', now()->addDays(3))
                ->whereDate('due_date', '>=', now())
                ->get();

            foreach ($reminders as $reminder) {
                $user->notify(new ReminderDueNotification($reminder));
            }
        }
    }
}
