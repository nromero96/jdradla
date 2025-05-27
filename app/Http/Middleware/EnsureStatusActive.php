<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureStatusActive
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status !== 'active') {
            Auth::logout();
            return redirect('/')->with('status', 'Your account is not active. Please contact the administrator.');
        }

        return $next($request);
    }
}
