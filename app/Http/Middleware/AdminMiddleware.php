<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Check if the user's role is 'Admin'
            if (Auth::user()->role === 'admin') {
                return $next($request);
            }
        }

        // If user is not logged in or doesn't have the 'Admin' role, redirect or deny access
        return redirect('/login'); // Or return an appropriate response
    }
}
