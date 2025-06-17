<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        // Get users with role 'user'
        $users = User::userRole()->get();

        // Debug dump users count
        // dd($users->count());

        return view('dashboard', compact('users'));
    }
}
